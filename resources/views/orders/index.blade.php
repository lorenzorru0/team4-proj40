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
            <h2>Ordini</h2>
        </div>

        <div class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.orders.index.delivered')}}">Visualizza ordini consegnati</a>
        </div>
        <div class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.orders.stats')}}">Visualizza statistiche</a>
        </div>
        
    </div>

    @if (count($orders) == 0)
        <h3>Nessun ordine in atessa di consegna.</h3>
    @else    
        <div class="table-responsive-sm">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id Ordine</th>
                        <th class="d-none d-md-table-cell" scope="col">Nome e Cognome</th>
                        <th class="d-none d-md-table-cell" scope="col">Indirizzo</th>
                        <th class="d-none d-md-table-cell" scope="col">Data e ora</th>
                        <th scope="col">Interagisci</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td class="d-none d-md-table-cell">{{$order->customer_firstname}} {{$order->customer_lastname}}</td>
                            <td class="d-none d-md-table-cell">{{$order->customer_address}} {{$order->customer_street_number}}</td>
                            <td class="d-none d-md-table-cell">{{$order->created_at}}</td>
                            <td>
                                <a href="{{route('admin.orders.show', $order->id)}}"><button type="button" class="btn btn-primary">Visualizza</button></a> <br>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning mt-2 deleteButtonOrder" data-order='{{$order->id}}' data-toggle="modal" data-target="#modalOrder">Segna come consegnato</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- Modal -->
<div class="modal fade" id="modalOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ordine consegnato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.orders.delivered', 'id') }}" method="POST">
                @csrf
                @method('PUT')
                <div id="test" class="modal-body">Sei sicuro di voler segnare come consegnato questo ordine?</div>
                <div class="modal-footer">
                    <input type="hidden" name="deleteId" id="deleteIdOrder">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Si</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection