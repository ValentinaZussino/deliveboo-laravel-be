@extends('layouts.admin')
@section('content')
<h1>index restaurant</h1>
<h3>{{$restaurant->name}}</h3>

{{-- @foreach ($restaurants as $restaurant)
    <h3>{{$restaurant->name}}</h3>
@endforeach --}}
@endsection