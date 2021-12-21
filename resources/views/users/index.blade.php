@extends('layouts.users.dashboard')

@section('pageContent')

<div class="container indexUser">
    <h2>Dettagli Ristorante</h2>

    @if ($user->url_cover)
        <div class="row my-5">
            <div class="col-6">

            <img class="logo mb-3 rounded" src="{{asset('storage/' . $user->url_cover)}}" alt="Cover photo ristorante">
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center col-6">
                <p>Nome Ristorante: <strong>{{$user->business_name}}</strong></p>
                <p>Indirizzo: <strong>{{$user->address}} {{$user->street_number}}</strong></p>
                <p>Partita IVA: <strong>{{$user->vat_number}}</strong></p>
            </div>
        </div>

            
        @else
        <p>Nessuna foto è stata inserita.</p>
    @endif

    <div class="row my-5">
    
        <div class="list col-sm-12 col-md-6 ">
            Tipologie:
            <div>
                @foreach ($user->types as $type)
                    <span> {{$type->name}} -</span>
                @endforeach
            </div>
        </div>
        
        <div class="list col-sm-12 col-md-6 text-center my-2">
            <img class="logo"  src="/images/logo_green.png" alt="">
        </div>
    </div>

@endsection


