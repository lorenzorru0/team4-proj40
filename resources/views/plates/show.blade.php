@extends('layouts.users.dashboard')

@section('pageContent')

<div class="container">
    <h2>{{$plate->plate_name}}</h2>

    <div class="row">
        <div class="col-12 col-md-6">
            <p>Prezzo: {{$plate->price}} €</p>
            @if ($plate->description)
                <p>Descrizione e Ingredienti: {{$plate->description}}</p>
            @endif
            @if ($plate->cooking_time)
                <p>Tempo cottura: {{$plate->cooking_time}} min</p>
            @endif
            @if ($plate->visible)
                <p>Visibile nel menù</p>
            @else
                <p>Non visibile nel menù</p>
            @endif
            <form action="{{route('admin.plates.visibility', $plate->id)}}" method="POST">
                @csrf
                @method('PUT')

                <button type="submit" class="btn btn-info mt-2">Visualizzazione nel menù</button>
            </form>
        </div>
        <div class="col-12 col-md-6">
            @if ($plate->url_photo)
                <img class="w-100 rounded" src="{{asset('storage/'. $plate->url_photo)}}" alt="Plate photo">
            @else
                <p>Non è stata caricata nessuna foto.</p>
            @endif
        </div>
    </div>
</div>

@endsection