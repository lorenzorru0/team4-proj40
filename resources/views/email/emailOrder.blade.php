<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email conferma ordine</title>
    <style>
        body{
            font-family: sans-serif;
            background-color: #76D3A0;
            color: white;
        }
        header{
            /* background-color: #00CCBE; */
            padding: 28px 0px;
            border-top-right-radius: 30px;
            border-top-left-radius: 15px;
            text-align: center;
        }
        header img{
            margin-left: -10px;
            max-width:70px;
            display:inline-block;
            text-align:center;
        }
        header h2{
            color:white;
            display:inline-block;
            font-size:28px;
        }
        header h1{
            color: white;
            font-size: 28px;
            text-align: center
        }
        main{
            padding: 10px;
            width: 100%;
        }
        main ul{
            width: 100%;
            display: flex;
        }
        main ul li{
            list-style: none;
            display: flex;
        }
        .list{
            padding: 10px;
        }
        .container {
            width: 100%;
        }
        .order {
            display: inline-block;
            width: 250px;
            word-spacing: 2px;
            font-size: 15px;
        }
        .order.price {
            text-align: end;
            width: 45px;
        }
        footer{
            display: flex;
            justify-content: center;
        }
        .btn{
            background-color: #00CCBE;
            border: none;
            border-radius: 20px;
            padding: 10px;
            margin: 30px 0;
        }
        .btn a{
        text-decoration: none;
        color: white;
        font-size:13px;
        font-weight:bold;
        text-align: center;
        }
    </style>
    </head>
    <body>
        <header>
            <div>
                <img src="{{ asset('images/logo_white.png') }}" alt="Deliveboo logo">
                <img src="{{ asset('images/logoTipoDeliveboo.png') }}" alt="Deliveboo logo">
            </div>
            <h1>Riepilogo ordine</h1>
        </header>
        <main>
            <h4>Nome: {{$newOrder['customer_firstname']}}</h4>
            <h4>Cognome: {{$newOrder['customer_lastname']}}</h4>
            <h4>Email: {{$newOrder['customer_email']}}</h4>
            <h4>Ristorante: {{$user['business_name']}}</h4>
                {{-- @foreach ($cart as $cartItem)
              
                        <div class="container">
                            <div class="row">
                                <div class="d-flex order">{{$cartItem->plate_name}}</div>
                                <div class="order price">{{$cartItem->price}}€</div>
                            </div>
                        </div>
                @endforeach --}}

            <h4>Prezzo totale pagato: {{$newOrder['total_price']}}€</h4>
        </main>
        <footer>
            <button class="btn">
                <a href="{{ url('/') }}" target="_blank">
                    Vai su Deliveboo
                </a>
            </button>
        </footer>
    </body>
</html>