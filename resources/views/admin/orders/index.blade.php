@extends('layouts.admin')
@section('content')
<h1>ordini index</h1>

@foreach ($orders as $order)
    <p>{{$order->name}}</p>
    <p>{{$order->last_name}}</p>
    <p>{{$order->phone}}</p>
    <p> <span>Ristorante</span> {{$order->restaurant_id}}</p>
   
    <ul>
        @foreach($order->plates as $plate)
        <li>{{ $plate->name }} </li>
        @endforeach
    </ul>
   
    <hr>
    <hr>
@endforeach

@endsection