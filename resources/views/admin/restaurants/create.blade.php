@extends('layouts.admin')
@section('content')
    <h1>Aggiungi il tuo Ristorante</h1>

    <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

            <div class="mb-3 col-lg-6">
                <label for="name" class="form-label">Nome del Ristorante</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                 <h6 class="fw-lighter">&#42;Nome obbligatorio</h6>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-6">
                <label for="address" class="form-label">Indirizzo civico</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                    name="address" placeholder="Via/C.so/P.zza xxxx xxxx, 12">
                    <h6 class="fw-lighter">&#42;Indirizzo civico obbligatorio</h6>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-6">
                <label for="email" class="form-label">Email del Ristorante</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email">
                    <h6 class="fw-lighter">&#42;Email del ristorante obbligatorio</h6>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-6">
                <label for="vat" class="form-label">P.IVA</label>
                <input type="text" class="form-control @error('vat') is-invalid @enderror" id="vat" name="vat">
                <h6 class="fw-lighter">&#42;P.IVA obbligatorio</h6>
                @error('vat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-6">
                <label for="phone" class="form-label">Recapito Telefonico</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                    name="phone" required>

                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="col-lg-6">

                <div class="d-flex">
                    <div>
                        <label for="opening_hours" class="form-label">Orario apertura</label>
                        <input type="time" id="opening_hours" name="opening_hours" min="00:00" max="24:00" required>
    
                        @error('opening_hours')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="mx-2">
                        <label for="closing_hours" class="form-label">Orario Chiusura</label>
                        <input type="time" id="closing_hours" name="closing_hours" min="00:00" max="24:00" required>
    
                        @error('closing_hours')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="mx-2">
                        <label for="opening_days" class="form-label">Giorni di apertura</label>
                        <input type="text" id="opening_days" name="opening_days" required>
    
                        @error('opening_days')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div>
                    <h6 class="fw-lighter">&#42;Campi obbligatori</h6>
                </div>
                
            </div>
            
                <label for="types" class="form-label">Selezionare la tipologia di cucina servita</label><br>
                <div class="tipi-select overflow-auto d-flex flex-column col-4">
                    @foreach ($types as $type)
                        <div class="d-flex">

                            <input type="checkbox" name="types[]" value="{{ $type->id }}">
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
                    pattern="https://.*" size="30">
                    


                    @error('website')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione del Ristorante</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Introduci il tuo ristoranti ai clienti"></textarea>

                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            


            <div class="mb-3 col-lg-6">
                <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
                <label for="image" class="form-label pb-4">Immagine</label>
                <input type="file" name="image" id="create_cover_image"
                    class="form-control  @error('image') is-invalid @enderror">

                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="text-center m-3">
            <button type="submit" class="btn btn-success">Crea</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>

    </form>
@endsection
