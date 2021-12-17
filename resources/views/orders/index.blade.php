@extends('layouts.users.dashboard')

@section('pageContent')

<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
        </div>
    @endif
    
    <div>
        <h2>Ordini</h2>
    </div>

    <div class="table-responsive-sm">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id Ordine</th>
                    <th scope="col">Nome e Cognome</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">Interagisci</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->customer_firstname}} {{$order->customer_lastname}}</td>
                        <td>{{$order->customer_address}} {{$order->customer_street_number}}</td>
                        <td>
                            <a href="{{route('admin.orders.show', $order->id)}}"><button type="button" class="btn btn-primary">Visualizza</button></a> <br>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger mt-2 deleteButtonOrder" data-order='{{$order->id}}' data-toggle="modal" data-target="#modalOrder">Elimina</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="modalOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Elimina ordine</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.orders.destroy', 'id') }}" method="POST">
                @csrf
                @method('DELETE')
                <div id="test" class="modal-body">Sei sicuro di voler eliminare l'ordine?</div>
                <div class="modal-footer">
                    <input type="hidden" name="deleteId" id="deleteIdOrder">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection