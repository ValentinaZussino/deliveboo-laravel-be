@extends('layouts.admin')
@section('content')
<h1>index plate</h1>
    @foreach ($plates as $plate)
    <p>{{$plate->name}}</p>
    <p>{{$plate->slug}}</p>
    @endforeach
@endsection