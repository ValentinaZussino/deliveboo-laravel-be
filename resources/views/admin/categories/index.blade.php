@extends('layouts.admin')
@section('content')

<div class="col-12 mb-3">
  <div class="card">
    <div class="card-top px-card pt-4">
        <div class="row justify-content-between align-items-center gy-2">
            {{-- TITOLO --}}
            <div class="col-sm-4 col-md-6 col-lg-8">
                <h5 class="px-2 gap-1 mb-0">Add New Category</h5>
            </div>

            {{-- CAMPO DI INPUT PER CREARE UNA NUOVA RIGA --}}
            <div class="col-sm-8 col-md-6 col-lg-4 px-4">
                <form action="{{route('admin.categories.store')}}" method="post" class="d-flex align-items-center">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Add a type name here " aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-success" type="submit" id="button-addon2">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

            {{-- ALERT --}}
            @if(session()->has('message'))
            <div class="alert alert-success mb-3 mt-3">
                {{ session()->get('message') }}
            </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger mb-3 mt-3">
                    @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                    @endforeach   
                </div> 
            @endif

            {{-- TABELLA --}}
        <div class="py-4">
            <div class="table-responsive datatable-custom">
                <table class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                    <thead class="thead-light">
                        <tr class="table-active">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            {{-- <th scope="col">Plates</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                                <tr>
                                    <th>
                                        {{$category->id}}
                                    </th>
                                    <td>
                                        {{$category->name}}
                                    </td>
                                    {{-- <td>
                                        {{$category->plates && count($category->plates) > 0 ? count($category->plates) : 0}}
                                    </td> --}}
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>   
  <div class="px-4">
    {{ $categories->links('vendor.pagination.bootstrap-5') }}
  </div>
   
@endsection