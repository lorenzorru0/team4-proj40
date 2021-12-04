@extends('layouts.users.dashboard')

@section('pageContent')

<div class="container">
    <h1>Piatti</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome piatto</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Visibile</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plates as $plate)
                <tr>
                    <td>{{$plate->id}}</td>
                    <td>{{$plate->plate_name}}</td>
                    <td>{{$plate->description}}</td>
                    <td>{{$plate->price}}</td>
                    <td>{{$plate->visible}}</td>
                    <td>
                        <a href="{{}}"><button type="button" class="btn btn-primary">View</button></a> <br>
                        <a href="{{}}"><button type="button" class="btn btn-warning">Edit</button></a> <br>
                        <a href="{{}}"><button type="button" class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection