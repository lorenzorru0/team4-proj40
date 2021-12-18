<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree;
use App\User;
use App\Order;
use App\Plate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    protected $validationRules = [
        'amount' => 'numeric|required|min:0|max:9999.99',
        'customer_firstname' => 'string|required|min:3|max:50',
        'customer_lastname' => 'string|required|min:3|max:50',
        'customer_email' => 'string|required|min:3|max:50',
        'customer_address' => 'string|required|min:3|max:50',
        'customer_street_number' => 'string|required|min:1|max:50',
        'notes' => 'nullable|string',
    ];

    public function paymentGet(Request $request, $id) {

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        
        $token = $gateway->ClientToken()->generate();

        $user = User::where('id', $id)->first();

        $user = $this->object_to_array($user->getAttributes());
    
        return view('hosted', compact('token', 'user'));
    }
    
    public function paymentPost(Request $request, $id) {
        $request->validate($this->validationRules);

        $newOrder = new Order();
        $newOrder['total_price'] = $request['amount'];
        $newOrder['customer_firstname'] = $request['customer_firstname'];
        $newOrder['customer_lastname'] = $request['customer_lastname'];
        $newOrder['customer_email'] = $request['customer_email'];
        $newOrder['customer_address'] = $request['customer_address'];
        $newOrder['customer_street_number'] = $request['customer_street_number'];
        $newOrder['notes'] = $request['notes'];
        $newOrder['deliver'] = 0;
        $newOrder['user_id'] = $id;
        $newOrder->save();

        $cart = $request->cart;
        $qty = $request->qty;

        $objectQty = (object) $qty;

        $user = User::where('id', $id)->first();

        $user = $this->object_to_array($user->getAttributes());
       
        $plates = Plate::where('user_id', $user)->get();

        foreach ($cart as $key => $item) {
            DB::table('order_plate')->insert([
                'plate_id' => $item,
                'order_id' => $newOrder->id,
                'quantity' => $qty[$key],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        
        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;
        
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $orders = Order::where('user_id')->get();

            $user = User::where('id', $newOrder->user_id)->first();

            $emails=[$newOrder->customer_email,$user['email']];
            
            $emailNames=[$newOrder->customer_firstname,$user['business_name']];

            foreach ($emails as $key=>$email){
                Mail::send('email.emailOrder', compact('newOrder','user','plates', 'objectQty'),
                function($message) use ($email,$emailNames,$key){
                    $message->to(strval($email),strval($emailNames[$key]))
                    ->subject('Il tuo ordine Deliveboo');
                });
            }
            
            return view('successfulPayment');
            
        } else {
            $errorString = "";
        
            foreach($result->errors->deepAll() as $error) {
                $errorString .= 'Errore: ' . $error->code . ": " . $error->message . "\n";
            }
    
            return back()->withErrors('Errore'. $result->message);
        }
    }
    
    public function object_to_array($data)
    {
        if (is_array($data) || is_object($data)) {
            $result = array();

            foreach ($data as $key => $value) {
                $result[$key] = $this->object_to_array($value);
            }

            return $result;
        }

        return $data;
    }
}
