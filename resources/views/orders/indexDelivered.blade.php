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
            <h2>Ordini consegnati</h2>
        </div>

        <div class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.orders.index')}}">Visualizza ordini da consegnare</a>
        </div>
    </div>

    @if (count($orders) == 0)
        <h3>Nessun ordine consegnato.</h3>
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
                                <a href="{{route('admin.orders.show', $order->id)}}"><button type="button" class="btn btn-primary">Visualizza</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection