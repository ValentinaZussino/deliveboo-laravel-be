@extends('layouts.admin')
@section('content')

<div class="container">
    <h1>show plate</h1>
    <h3>{{$plate->name}}</h3>

    {{-- img --}}
    <div class="w-25">
        <img src="{{$plate->image == $plate->image ? $plate->image : asset('storage/' . $plate->image)}}" alt="{{$plate->name}}">
    </div>
    {{-- ingredienti --}}
    <p>Ingredienti: {{$plate->ingredients}}</p>
    {{-- categoria --}}
    <p>Categoria: {{$plate->category->name}}</p>
    {{-- allergeni --}}
    @if ($plate->allergens)
        <p>Allergens: {{$plate->allergens}}</p>
    @endif
    {{-- disponibilità --}}
    <p>Disponibile: {{$plate->available == 1 ? 'Sì' : 'No'}}</p>

    {{-- back to plates --}}
    <button><a href="{{route('admin.plates.index')}}">Torna ai piatti</a></button>
</div>

@endsection