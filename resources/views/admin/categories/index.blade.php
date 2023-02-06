@extends('layouts.admin')
@section('content')

@if ($errors->any())
<div class="alert alert-danger mb-3 mt-3">
    @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
    @endforeach
</div> 
@endif

<h1>index category</h1>

<form action="{{route('admin.categories.store')}}" method="post" class="d-flex align-items-center">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="name" class="form-control" placeholder="Add a category name here " aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add</button>
    </div>
</form>

@if(session()->has('message'))
<div class="alert alert-success mb-3 mt-3">
    {{ session()->get('message') }}
</div>
@endif

    
    {{-- <p>{{$category->name}}</p> --}}
   
    <table class="table table-dark table-striped">
      
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Plate</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
          <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td>{{$category->plates && count($category->plates) > 0 ? count($category->plates) : 0}}</td>
          </tr>
          
        </tbody>
        @endforeach
      </table>
   
@endsection