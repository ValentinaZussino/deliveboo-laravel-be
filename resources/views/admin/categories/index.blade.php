@extends('layouts.admin')
@section('content')
<h1>index category</h1>
    
    {{-- <p>{{$category->name}}</p> --}}
   
    <table class="table table-dark">
      
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
          <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td></td>
            <td></td>
          </tr>
          
        </tbody>
        @endforeach
      </table>
   
@endsection