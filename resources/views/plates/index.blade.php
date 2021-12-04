@extends('layouts.users.dashboard')

@section('pageContent')
<div class="d-flex">
    <div class="nav-item">
      <a class="nav-link active" aria-current="page" href="{{ route('admin.plates.index')}}">All Plates</a>
    </div>
    <div class="nav-item">
      <a class="nav-link active" aria-current="page" href="{{ route('admin.plates.create')}}">Create New Plate</a>
    </div>
  </div>

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
                        <a href="{{route('admin.plates.show', $plate->id)}}"><button type="button" class="btn btn-primary">View</button></a> <br>
                        <a href="{{route('admin.plates.edit', $plate->id)}}"><button type="button" class="btn btn-warning">Edit</button></a> <br>
                        <a href="{{route('admin.plates.destroy', $plate->id)}}"><button type="button" class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection