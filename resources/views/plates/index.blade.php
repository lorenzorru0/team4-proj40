@extends('layouts.users.dashboard')

@section('pageContent')

<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
        </div>
    @endif
    
    <div class="d-flex justify-content-between">
        <div>
            <h2>Menù</h2>
        </div>

        <div class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.plates.create')}}">Crea nuovo piatto</a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome Articolo</th>
                <th scope="col">Descrizione/Ingredienti</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Visibilità</th>
                <th scope="col">Interagisci</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plates as $plate)
                <tr>
                    <td>{{$plate->plate_name}}</td>
                    <td>{{$plate->description}}</td>
                    <td>{{$plate->price}} €</td>
                    <td>
                        @if ($plate->visible)
                            Si
                        @else
                            No 
                        @endif
                        <br>
                        <form action="{{route('admin.plates.visibility', $plate->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <button type="submit" class="btn btn-info mt-2">Visualizza nel menù</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('admin.plates.show', $plate->id)}}"><button type="button" class="btn btn-primary">Visualizza</button></a> <br>
                        <a href="{{route('admin.plates.edit', $plate->id)}}"><button type="button" class="btn btn-warning mt-2">Modifica</button></a> <br>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger mt-2 deleteButton" data-id='{{$plate->id}}' data-toggle="modal" data-target="#exampleModal">Elimina</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Elimina Articolo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.plates.destroy', 'id') }}" method="POST">
                @csrf
                @method('DELETE')
                <div id="test" class="modal-body">
                   Sei sicuro di voler eliminare l'articolo?
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="deleteId" id="deleteId">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection