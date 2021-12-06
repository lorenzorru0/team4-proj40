@extends('layouts.users.dashboard')

@section('pageContent')

<div class="container">
    <ul>
        <li>Nome del piatto: <strong>{{$plate->plate_name}}</strong></li>
        <li>Prezzo: {{$plate->price}} €</li>
        @if ($plate->description)
            <li>Descrizione: {{$plate->description}}</li>
        @endif
        @if ($plate->cooking_time)
            <li>Tempo cottura: {{$plate->cooking_time}} min</li>
        @endif
    </ul>
    
    @if ($plate->url_photo)
        <img src="{{asset('storage/'. $plate->url_photo)}}" alt="Plate photo">
    @endif
</div>

@endsection