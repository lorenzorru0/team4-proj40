@extends('layouts.users.dashboard')

@section('pageContent')

<div class="container">
    <h2>Ordine numero: {{$order->id}}</h2>

    <div class="row">
        <div class="col-12 col-md-6">
            <p><strong>Dati destinatario:</strong> </p>
            <p>Nome: {{$order->customer_firstname}}</p>
            <p>Cognome: {{$order->customer_lastname}}</p>
            <p>Email: {{$order->customer_email}}</p>
            <p>Indirizzo: {{$order->customer_address}} {{$order->customer_street_number}}</p>
            @if ($order->notes)
                <p>Note: {{$order->notes}}</p>
            @endif
            <p>Giorno e ora: {{$order->created_at}}</p>
        </div>
        <div class="col-12 col-md-6">
            <p><strong>Dati ordine:</strong></p>
            @foreach ($order->plates as $plate)
                <p>{{$plate->pivot['quantity']}}x {{$plate->plate_name}}</p>
            @endforeach
            <p>Importo totale: {{$order->total_price}} €</p>
        </div>
    </div>
</div>

@endsection