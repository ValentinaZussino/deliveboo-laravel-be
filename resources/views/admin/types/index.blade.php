@extends('layouts.admin')
@section('content')
<h1>index type</h1>
    @foreach ($types as $type)
        <p>{{$type->name}}</p>
    @endforeach
@endsection