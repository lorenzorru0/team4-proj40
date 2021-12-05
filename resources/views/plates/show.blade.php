@extends('layouts.users.dashboard')

@section('pageContent')

<div class="container">
    <ul>
        <li>{{$plate->plate_name}}</li>
    </ul>
    <img src="{{asset('storage/'. $plate->url_photo)}}" alt="Plate photo">
</div>

@endsection