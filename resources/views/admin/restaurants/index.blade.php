@extends('layouts.admin')
@section('content')
    <h1>{{ $restaurant->name }}</h1>

    <div>
        Indirizzo:
        <p>{{ $restaurant->address }}</p>
    </div>
    <div>
        P.IVA:
        <p>{{ $restaurant->vat }}</p>
    </div>

    <div class="w-50">
        <img class="w-100" src="{{ $restaurant->image }}" alt="">
                  {{-- nuovo path da utilizzare una volta importate correttamente le immagini nello storage e associate ai ristoranti --}}
                        {{-- @if ($restaurant->image)
                            <img class="image-container" src="{{ asset('storage/' . $product->image) }}" alt="{{$product->name}}">
                        @else
                            <small class="text-secondary">No image</small>
                        @endif --}}      
    </div>

    <div>
        Contatti:
        <p>{{ $restaurant->phone }}</p>
        <a href="{{ $restaurant->website }}">Sito</a>
        <p>{{ $restaurant->email }}</p>
    </div>
    <div class="d-flex gap-4">
        Orari:
        <p>{{ $restaurant->opening_days }}</p>
        <p>{{ $restaurant->opening_hours }}</p>
        <p>{{ $restaurant->closing_hours }}</p>
    </div>

    <div>
        Descrizione:
        <p>{{ $restaurant->description }}</p>
    </div>

    <div>
        Rustorante creato il:
        <p>{{ $restaurant->created_at }}</p>
    </div>





    <a class="link-secondary" href="{{ route('admin.restaurants.edit', $restaurant->slug) }}" title="Edit product">
        Modifica informazioni <i class="fa-solid fa-pen"></i>
    </a>

    {{-- @foreach ($restaurants as $restaurant)
    <h3>{{$restaurant->name}}</h3>
@endforeach --}}
@endsection
