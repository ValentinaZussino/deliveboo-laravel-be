@extends('layouts.admin')
@section('content')

<div class="container">
    {{-- messages --}}
    @if(session()->has('message'))
    <div class="alert alert-success mb-3 mt-3 w-75 m-auto text-capitalize">
        {{ session()->get('message') }}
    </div>
    @endif
    {{-- form --}}
    <form action="{{ route('admin.plates.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
        @csrf
        <h3>Crea nuovo piatto</h3>
        {{-- nome --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" id="name" name="name" required maxlength="100" minlength="2">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- prezzo --}}
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}" id="price" name="price" required min="0" max="9999,99">
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        {{-- disponibilità --}}
        <div class="mb-3">
        <fieldset>
            <legend>Disponibilità</legend>
            <div>
                <input type="radio" id="available" name="available" value="1" required checked/>
                <label for="available">disponibile</label>
                <input type="radio" id="available" name="available" value="0" required />
                <label for="available">non disponibile</label>
            </div>
        </fieldset>
        </div>
        {{-- immagine --}}
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        {{-- ingredienti--}}
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredienti</label>
            <textarea class="form-control" id="ingredients" name="ingredients" required >{{old('ingredients')}}</textarea>
            @error('ingredients')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- allergeni--}}
        <div class="mb-3">
            <label for="allergens" class="form-label">Allergeni</label>
            <input type="text" class="form-control @error('allergens') is-invalid @enderror" value="{{old('allergens')}}" id="allergens" name="allergens">
            @error('allergens')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- size--}}
        <div class="mb-3">
            <label for="size" class="form-label">Dimensioni</label>
            <input type="text" class="form-control @error('size') is-invalid @enderror" value="{{old('size')}}" id="size" name="size" maxlength="30">
            @error('size')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- categoria --}}
        <div class="mb-3">
            <label for="category_id" class="form-label">Seleziona la categoria</label>
            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                <option value="">Seleziona la categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }} >
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- btns --}}
        <button type="submit" class="btn btn-success">Crea</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
</div>

@endsection