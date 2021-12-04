@extends('layouts.users.dashboard')

@section('pageContent')

<div class="container">
    <h2>Dettagli Ristorante</h2>
    
    <ul>
        <li>Nome Ristorante: {{$user->business_name}}</li>
        <li>Indirizzo: {{$user->address}} {{$user->street_number}}</li>
        <li>Partita IVA: {{$user->vat_number}}</li>
        <li>
            <img src="{{asset('storage/' . $user->url_cover)}}" alt="">
        </li>
    </ul>
</div>

@endsection

