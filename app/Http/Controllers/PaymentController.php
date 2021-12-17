<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree;
use App\User;

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
    
    public function paymentPost(Request $request) {
        
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
