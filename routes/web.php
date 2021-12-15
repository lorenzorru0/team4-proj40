<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/checkout', function () {

    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
    ]);
    
    $token = $gateway->ClientToken()->generate();

    return view('hosted', [
        'token' => $token
    ]);
});

Route::post('/checkout', function (Request $request) {
    
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
        $transaction = $result->transaction;
        // header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);
        return back()->with('success_message', 'Transazione avvenuta con successo. Il numero identificativo della transazione è:'. $transaction->id);
    } else {
        $errorString = "";
    
        foreach($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }
    
        // $_SESSION["errors"] = $errorString;
        // header("Location: " . $baseUrl . "index.php");

        return back()->withErrors('Errore'. $result->message);
        
    }
    
});

Route::get('/', 'PageController@index')->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Rotte area Admin
Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function() {
    // Route::get('/', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::resource('plates', 'PlatesController');
    Route::put('/plates/{plate}/visibility', 'Platescontroller@changeVisibility')->name('plates.visibility');
});

Route::get('/{any}', 'PageController@index')->where('any', '.*');





