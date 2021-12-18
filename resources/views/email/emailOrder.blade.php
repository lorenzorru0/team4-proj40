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
            padding: 28px 0px;
            border-top-right-radius: 30px;
            border-top-left-radius: 15px;
            text-align: center;
        }
        header img{
            margin: 10px 0;
            margin-left: -10px;
            max-width:70px;
            display:inline-block;
            text-align:center;
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
        }
        main ul li{
            list-style: none;
            margin: 10px 0;
        }
        .container {
            width: 100%;
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
            </div>
            <div>
                <img src="{{ asset('images/logoTipoDeliveboo.png') }}" alt="Deliveboo logo">
            </div>
            <h1>Dettagli ordine</h1>
        </header>
        <main>
            <h4>Nome: {{$newOrder['customer_firstname']}}</h4>
            <h4>Cognome: {{$newOrder['customer_lastname']}}</h4>
            <h4>Email: {{$newOrder['customer_email']}}</h4>
            <h4>Ristorante: {{$user['business_name']}}</h4>
            @foreach ($objectQty as $itemQty)
                <div>x {{$itemQty}} </div>
            @endforeach
            <ul>
                @foreach ($plates as $item)
                <li> {{$item->plate_name}} {{$item->price}}€</li>
                @endforeach
            </ul>
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