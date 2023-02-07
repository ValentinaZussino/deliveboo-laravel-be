@extends('layouts.admin')
@section('content')
<div class="container">
    <h1>index plate</h1>
    {{-- messages --}}
    @if(session()->has('message'))
    <div class="alert alert-success mb-3 mt-3 w-75 m-auto text-capitalize">
        {{ session()->get('message') }}
    </div>
    @endif
    {{-- alla create --}}
    <a href="{{route('admin.plates.create')}}" class="text-white"><button class="btn btn-primary mb-2"><i class="fa-solid fa-plus"></i></button></a>
    {{-- tabella --}}
    <table class="mb-2">
        <thead>
            <tr>
                <th class="bl-hidden" scope="col">#</th>
                <th scope="col">Name</th>
                <th class="bl-hidden" scope="col">Price</th>
                <th class="bl-hidden" scope="col">Available</th>
                <th class="bl-hidden" scope="col">Ingredients</th>
                <th class="bl-hidden" scope="col">Id rist</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plates as $plate)
                <tr>
                    <th class="bl-hidden" scope="row">{{$plate->id}}</th>
                    <td><a href="{{route('admin.plates.show', $plate->slug)}}" title="View plate">{{$plate->name}}</a></td>
                    <td class="bl-hidden">{{$plate->price}}&nbsp;&euro;</td>
                    <td class="bl-hidden">{{$plate->available}}</td>
                    <td class="bl-hidden">{{$plate->ingredients}}</td>
                    <td class="bl-hidden">{{$plate->restaurant_id}}</td>
                    <td><a class="link-secondary" href="{{route('admin.plates.edit', $plate->slug)}}" title="Edit plate"><i class="fa-solid fa-pen"></i></a></td>
                    <td>
                        <form action="{{route('admin.plates.destroy', $plate->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$plate->name}}"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $plates->links('vendor.pagination.bootstrap-5') }} --}}
    @include('partials.admin.modal-delete')
</div>

    {{-- @foreach ($plates as $plate)
    <p>{{$plate->name}}</p>
    <p>{{$plate->slug}}</p>
    @endforeach --}}
@endsection