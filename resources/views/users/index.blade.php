@extends('layouts.users.dashboard')

@section('pageContent')

<div class="container indexUser">
    <h2>Dettagli Ristorante</h2>

    @if ($user->url_cover)
        <img class="w-100 mb-3 rounded" src="{{asset('storage/' . $user->url_cover)}}" alt="Cover photo ristorante">
    @else
        <p>Nessuna foto è stata inserita.</p>
    @endif

    <div class="row">
        <div class="col-6">
            <p>Nome Ristorante: <strong>{{$user->business_name}}</strong></p>
            <p>Indirizzo: <strong>{{$user->address}} {{$user->street_number}}</strong></p>
            <p>Partita IVA: <strong>{{$user->vat_number}}</strong></p>
        </div>
        <div class="col-6">
            Tipologie collegate:
            <ol>
                @foreach ($user->types as $type)
                    <li><strong>{{$type->name}}</strong></li>
                @endforeach
            </ol>
        </div>
    </div>
</div>

@endsection

