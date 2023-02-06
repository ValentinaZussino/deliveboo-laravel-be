@extends('layouts.admin')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger mb-3 mt-3">
            @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
            @endforeach   
        </div> 
    @endif

    <h1>Types</h1>
    
    <form action="{{route('admin.types.store')}}" method="post" class="d-flex align-items-center">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Add a type name here " aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add</button>
        </div>
    </form>

    @if(session()->has('message'))
    <div class="alert alert-success mb-3 mt-3">
        {{ session()->get('message') }}
    </div>
    @endif

    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Type</th>
            <th scope="col">Restaurants</th>
        </tr>
        </thead>
        <tbody>
        @foreach($types as $type)
                <tr>
                    <th>
                        {{$type->id}}
                    </th>
                    <td>
                        {{$type->name}}
                    </td>
                    <td>
                        {{$type->restaurants && count($type->restaurants) > 0 ? count($type->restaurants) : 0}}
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
@endsection