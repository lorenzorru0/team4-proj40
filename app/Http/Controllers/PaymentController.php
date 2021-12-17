<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree;
use App\User;
use App\Order;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
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

        $newOrder = new Order();
        $newOrder['total_price'] = $request['amount'];
        $newOrder['customer_firstname'] = $request['customer_firstname'];
        $newOrder['customer_lastname'] = $request['customer_lastname'];
        $newOrder['customer_email'] = $request['customer_email'];
        $newOrder['customer_address'] = $request['customer_address'];
        $newOrder['customer_street_number'] = $request['customer_street_number'];
        $newOrder['notes'] = $request['notes'];
        $newOrder['user_id'] = $id;
        $newOrder->save();

        $cart = $request->cart;
        $qty = $request->qty;

        foreach ($cart as $key => $item) {
            DB::table('order_plate')->insert([
                'plate_id' => $item,
                'order_id' => $newOrder->id,
                'quantity' => $qty[$key]
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
            // $transaction = $result->transaction;
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