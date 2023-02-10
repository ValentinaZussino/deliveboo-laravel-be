@extends('layouts.admin')
@section('content')
    <h1>Modifica Informazioni</h1>

    <form action="{{ route('admin.restaurants.update',$restaurant->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            
                <div class="mb-3 col-lg-6">
                    <label for="name" class="form-label">Nome del Ristorante</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required  value="{{old('name', $restaurant->name)}}">
                    <h6 class="fw-lighter">Nome obbligatorio*</h6>
    
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-3 col-lg-6">
                    <label for="address" class="form-label">Indirizzo civico</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address" value="{{old('address', $restaurant->address)}}" >
                        <h6 class="fw-lighter">indirizzo civico obbligatorio*</h6>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-3 col-lg-6">
                    <label for="email" class="form-label">Email del Ristorante</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{old('email', $restaurant->email)}}" >
                        <h6 class="fw-lighter">Email del ristorante obbligatorio*</h6>
    
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-3 col-lg-6">
                    <label for="vat" class="form-label">P.IVA</label>
                    <input type="text" class="form-control @error('vat') is-invalid @enderror" id="vat" name="vat" value="{{old('vat', $restaurant->vat)}}">
                    <h6 class="fw-lighter">P.IVA obbligatorio*</h6>
    
                    @error('vat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-3 col-lg-6">
                    <label for="phone" class="form-label">Recapito Telefonico</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                        name="phone" value="{{old('phone', $restaurant->phone)}}">
    
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


            <div class="d-flex col-lg-6">

                <div class="mb-3">
                    <label for="opening_hours" class="form-label">Orario apertura</label>
                    <input type="time" id="opening_hours" name="opening_hours" min="00:00" max="24:00" required value="{{old('opening_hours', $restaurant->opening_hours)}}">

                    @error('opening_hours')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="closing_hours" class="form-label">Orario Chiusura</label>
                    <input type="time" id="closing_hours" name="closing_hours" min="00:00" max="24:00" required value="{{old('closing_hours', $restaurant->closing_hours)}}">

                    @error('closing_hours')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="opening_days" class="form-label">Giorni di apertura</label>
                    <input type="text" id="opening_days" name="opening_days" required value="{{old('opening_days', $restaurant->opening_days)}}">

                    @error('opening_days')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
               
            </div>
            <h6 class="fw-lighter mb-3">Orari obbligatori*</h6>

            
            <label for="types" class="form-label">Selezionare la tipologia di cucina servita</label><br>
            <div class="tipi-select overflow-auto d-flex flex-column col-4">
                @foreach ($types as $type)
                    <div class="d-flex">

                        <input type="checkbox" name="types[]" value="{{ $type->id }}"  {{old('type', $restaurant->type) ? (old('type', $restaurant->type)->contains($type->id)) ? 'checked' : '' : ''}}>
                        <span class="text-capitalize">{{ $type->name }}</span>

                    </div>
                @endforeach

                @error('types')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>

            <div class="my-3">
                <label for="website" class="form-label">Sito Web del Ristorante</label>
                <input type="url" id="website" name="website" placeholder="https://example.com"
                pattern="https://.*" size="30"
                required value="{{old('website',$restaurant->website)}}">

                @error('website')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione del Ristorante</label>
                <textarea class="form-control" id="description" name="description" placeholder="Introduci il tuo ristoranti ai clienti" >{{old('description', $restaurant->description)}}</textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            


            <div class="mb-3 col-lg-6">
                <img id="uploadPreview" width="100" src="{{old('image',$restaurant->image)}}">
                <label for="image" class="form-label px-3">Immagine</label>
                <input type="file" name="image" id="create_cover_image"
                    class="form-control  @error('image') is-invalid @enderror">

                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="text-center m-3">
            <button type="submit" class="btn btn-success">Modifica</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>

    </form>
@endsection
