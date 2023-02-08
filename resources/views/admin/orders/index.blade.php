@extends('layouts.admin')
@section('content')

<div class="col-12 mb-3">
    {{-- messages --}}
    @if(session()->has('message'))
    <div class="alert alert-success mb-3 mt-3 w-75 m-auto text-capitalize">
        {{ session()->get('message') }}
    </div>
    @endif
    
    <div class="card">
        <div class="card-top px-card pt-4">
            <div class="row justify-content-between align-items-center gy-2">
                {{-- TITOLO --}}
                <div class="col-sm-4 col-md-6 col-lg-8">
                    <h3 class="px-2 gap-1 mb-0 ms-1">Ordini</h5>
            </div>
        </div>
    </div>

     {{-- LISTA ORDINI--}}
     <div class="container-fluid pt-2">
        <div class="row row-cols-1 row-cols-md-5 g-4 pb-5">
            @foreach($orders as $order)
            <div class="col">
                <div class="card border-dark ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                 <p class="card-text"><span class="fw-semibold">Data: </span>{{$order->date}}</p>
                                 
                                {{-- <button type="submit" class="delete-button btn btn-danger "><i class="fa-solid fa-trash-can"></i></button> --}}

                                <form action="{{route('admin.orders.destroy', $order->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$order->name}}"><i class="fa-solid fa-trash-can"></i></button>
                                </form>

                            </div>
                            <p class="card-text"><span class="fw-semibold">Nome: </span>{{$order->name}}</p>
                            <p class="card-text"><span class="fw-semibold">Cognome: </span>{{$order->name}}</p>
                            <p class="card-text"><span class="fw-semibold">Cellulare: </span> {{$order->phone}}</p>
                            <p class="card-text"><span class="fw-semibold">Indirizzo: </span> {{$order->address}}</p>
                            <p class="card-text"><span class="fw-semibold">Totale: </span>{{$order->total_amount}}&nbsp;&euro;</p>
                            <hr>

                            <p class="card-text fw-semibold">Piatti ordinati:</p>
                            <ul>
                                @foreach($order->plates as $plate)
                                <li>{{ $plate->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                </div>
            </div>

            @endforeach
          </div>
    </div>

    @include('partials.admin.modal-delete')

@endsection