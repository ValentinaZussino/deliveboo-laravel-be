@extends('layouts.admin')
@section('content')
<h1>index category</h1>
    @foreach ($categories as $category)
    <p>{{$category->name}}</p>
    @endforeach
@endsection