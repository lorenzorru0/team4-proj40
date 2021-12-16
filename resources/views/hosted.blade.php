<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="/css/app.css">
        <style>
            body {
                margin: 24px 0;
            }
            .spacer {
                margin-bottom: 24px;
            }
            #card-number, #cvv, #expiration-date {
                background: white;
                height: 38px;
                border: 1px solid #CED4DA;
                padding: .375rem .75rem;
                border-radius: .25rem;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div>
                <h1>Dettagli Pagamento</h1>
                <div class="spacer"></div>

                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ url('/checkout') }}" method="POST" id="payment-form">
                    @csrf
                    <div class="form-group">
                        <label for="customer_email">Indirizzo email *</label>
                        <input type="email" class="form-control" id="email" name="customer_email" value="{{old('customer_email')}}" required>
                    </div>

                    <div class="row">
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label for="name_on_card">Nome *</label>
                          <input type="text" class="form-control" id="name_on_card" name="customer_firstname" value="{{old('customer_firstname')}}" required>
                        </div>
                      </div>

                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label for="name_on_card">Cognome *</label>
                          <input type="text" class="form-control" id="name_on_card" name="customer_lastname" value="{{old('customer_lastname')}}" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Indirizzo di spedizione *</label>
                                <input type="text" class="form-control" id="address" name="customer_address" value="{{old('customer_address')}}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_street_number">Numero civico *</label>
                                <input type="text" class="form-control" id="city" name="customer_street_number" value="{{old('customer_street_number')}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="notes">Note</label>
                      <textarea name="notes" id="description" class="form-control" cols="10" rows="3">{{old('notes')}}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total_price">Importo totale: </label>
                                <input type="text" class="form-control" id="total_price" name="total_price" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="cc_number">Numero Carta *</label>

                            <div class="form-group" id="card-number">

                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="expiry">Data scadenza *</label>

                            <div class="form-group" id="expiration-date">

                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cvv">CVV *</label>

                            <div class="form-group" id="cvv">

                            </div>
                        </div>

                    </div>

                    <div class="spacer"></div>

                    <div id="paypal-button"></div>

                    <div class="spacer"></div>

                    <input id="nonce" name="payment_method_nonce" type="hidden" />
                    <button type="submit" class="btn btn-success">Paga ora</button>
                </form>
            </div>
        </div>
    <script src="https://js.braintreegateway.com/web/3.38.1/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.38.1/js/hosted-fields.min.js"></script>

    <!-- Load PayPal's checkout.js Library. -->
    <script src="https://www.paypalobjects.com/api/checkout.js" data-version-4 log-level="warn"></script>

    <!-- Load the PayPal Checkout component. -->
    <script src="https://js.braintreegateway.com/web/3.38.1/js/paypal-checkout.min.js"></script>
    <script>
      var form = document.querySelector('#payment-form');
      var submit = document.querySelector('input[type="submit"]');

      braintree.client.create({
        authorization: '{{ $token }}'
      }, function (clientErr, clientInstance) {
        if (clientErr) {
          console.error(clientErr);
          return;
        }
        // This example shows Hosted Fields, but you can also use this
        // client instance to create additional components here, such as
        // PayPal or Data Collector.
        braintree.hostedFields.create({
          client: clientInstance,
          styles: {
            'input': {
              'font-size': '14px'
            },
            'input.invalid': {
              'color': 'red'
            },
            'input.valid': {
              'color': 'green'
            }
          },
          fields: {
            number: {
              selector: '#card-number',
              placeholder: '4111 1111 1111 1111'
            },
            cvv: {
              selector: '#cvv',
              placeholder: '123'
            },
            expirationDate: {
              selector: '#expiration-date',
              placeholder: '12/2024'
            }
          }
        }, function (hostedFieldsErr, hostedFieldsInstance) {
          if (hostedFieldsErr) {
            console.error(hostedFieldsErr);
            return;
          }
          // submit.removeAttribute('disabled');
          form.addEventListener('submit', function (event) {
            event.preventDefault();
            hostedFieldsInstance.tokenize(function (tokenizeErr, payload) {
              if (tokenizeErr) {
                console.error(tokenizeErr);
                return;
              }
              // If this was a real integration, this is where you would
              // send the nonce to your server.
              // console.log('Got a nonce: ' + payload.nonce);
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          }, false);
        });
        // Create a PayPal Checkout component.
        braintree.paypalCheckout.create({
            client: clientInstance
        }, function (paypalCheckoutErr, paypalCheckoutInstance) {
        // Stop if there was a problem creating PayPal Checkout.
        // This could happen if there was a network error or if it's incorrectly
        // configured.
        if (paypalCheckoutErr) {
          console.error('Error creating PayPal Checkout:', paypalCheckoutErr);
          return;
        }
        // Set up PayPal with the checkout.js library
        paypal.Button.render({
          env: 'sandbox', // or 'production'
          commit: true,
          payment: function () {
            return paypalCheckoutInstance.createPayment({
              // Your PayPal options here. For available options, see
              // http://braintree.github.io/braintree-web/current/PayPalCheckout.html#createPayment
              flow: 'checkout', // Required
              amount: 13.00, // Required
              currency: 'USD', // Required
            });
          },
          onAuthorize: function (data, actions) {
            return paypalCheckoutInstance.tokenizePayment(data, function (err, payload) {
              // Submit `payload.nonce` to your server.
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          },
          onCancel: function (data) {
            console.log('checkout.js payment cancelled', JSON.stringify(data, 0, 2));
          },
          onError: function (err) {
            console.error('checkout.js error', err);
          }
        }, '#paypal-button').then(function () {
          // The PayPal button will be rendered in an html element with the id
          // `paypal-button`. This function will be called when the PayPal button
          // is set up and ready to be used.
        });
        });
      });

      let user = '<?php echo json_encode($user); ?>';
      user = JSON.parse(user);
      console.log(user);

      let cart = JSON.parse(window.localStorage.getItem(`cart-${user.id}`));
      let qty = JSON.parse(window.localStorage.getItem(`qty-${user.id}`));
      console.log(cart);
      console.log(qty);

      let totalPrice = 0;

      cart.cart.forEach(element => {
        totalPrice += element.price * qty.qty[element.id];
      });
      document.getElementById('total_price').value = totalPrice;
      console.log(totalPrice);

    </script>
    </body>
</html>