@extends('layouts.app')

@section('pageContent')
<h2>Dettagli Ristorante</h2>

    <ul>
        <li>Nome Ristorante: {{$user->business_name}}</li>
        <li>Indirizzo: {{$user->address}}</li>
        <li>Partita IVA: {{$user->vat_number}}</li>
    </ul>

@endsection