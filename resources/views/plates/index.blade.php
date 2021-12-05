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
            <h2>Piatti</h2>
        </div>

        <div class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.plates.create')}}">Create New Plate</a>
        </div>
    </div>

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

                            <button type="submit" class="btn btn-info mt-2">Change visibility</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('admin.plates.show', $plate->id)}}"><button type="button" class="btn btn-primary">View</button></a> <br>
                        <a href="{{route('admin.plates.edit', $plate->id)}}"><button type="button" class="btn btn-warning mt-2">Edit</button></a> <br>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger mt-1 deleteButton" data-id='{{$plate->id}}' data-toggle="modal" data-target="#exampleModal">Delete</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Deleting plate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.plates.destroy', 'id') }}" method="POST">
                @csrf
                @method('DELETE')
                <div id="test" class="modal-body">
                    Are you sure that you want delete this plate?
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="deleteId" id="deleteId">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection