@extends('layouts.admin')

@section('content')
    
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-top px-card pt-4">
                    <div class="row justify-content-between align-items-center gy-2">
                        {{-- TITOLO --}}
                        <div class="col-sm-4 col-md-6 col-lg-8">
                            <h3 class="px-2 gap-1 mb-0 ms-5">Tipologie</h5>
                    </div>
                </div>
            </div>

            {{-- LISTA --}}
            <div class="container-fluid pt-2">
                <div class="d-flex flex-wrap">
                    @foreach($types as $type)
        
                    <div class="column-2">
                        <div class="card-2 text-capitalize">{{ $type->name }}</div>
                    </div>
        
                    @endforeach
                </div>
            </div>

            <div class="px-4">
                {{ $types->links('vendor.pagination.bootstrap-5') }}
            </div>
        
@endsection