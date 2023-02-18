@extends('layouts.admin')
@section('content')
<div class="restaurants-background">


<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                 @if ($restaurant->image)
                <img class="card-img-top mb-5 mb-md-0 w-100" src="{{ asset('storage/'.$restaurant->image) }}" alt="{{$restaurant->name}}">
                @else
                    <img class="img-fluid rounded-start" src="{{ asset('img/no-image.jpg') }}" alt="{{$restaurant->name}}">
                @endif
            </div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bolder text-white">{{ $restaurant->name }}</h1>
                <div class="fs-5 mb-5">
                    <span class="text-white">{{ $restaurant->address }}</span>
                    <span class="d-flex text-white"> Orari:
                        <p class="day-open text-white">{{ $restaurant->opening_days }}</p>
                        <p class="day-open text-white">{{ $restaurant->opening_hours }}</p>
                        <p class="day-open text-white">{{ $restaurant->closing_hours }}</p></span>
                </div>
                <div class="small mb-3 text-white">P.IVA: {{ $restaurant->vat }}</div>
                
                
                <p class="lead text-white">{{ $restaurant->description }}</p>
                <div class="d-flex">
                   
                        
                        <a class="btn btn-dark  text-white" href="{{ route('admin.restaurants.edit', $restaurant->slug) }}" title="Edit product">
                            Modifica informazioni <i class="fa-solid fa-pen"></i>
                        </a>
                    
                </div>
            </div>
        </div>
    </div>
</section>
</div>

@endsection
