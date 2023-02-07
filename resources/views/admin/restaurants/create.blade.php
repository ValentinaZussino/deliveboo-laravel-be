@extends('layouts.admin')
@section('content')
    <h1>create restaurant</h1>

    <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

            <div class="mb-3">
                <label for="name" class="form-label">Restaurant Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Restaurant address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                    name="address">

                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Restaurant email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email">

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="vat" class="form-label">Restaurant vat</label>
                <input type="text" class="form-control @error('vat') is-invalid @enderror" id="vat" name="vat">

                @error('vat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Restaurant phone</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                    name="phone">

                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="d-flex">

                <div class="mb-3">
                    <label for="opening_hours" class="form-label">Opens at</label>
                    <input type="time" id="opening_hours"" name="opening_hours"" min="00:00" max="24:00" required>

                    @error('opening_hours')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="closing_hours" class="form-label">Closes at</label>
                    <input type="time" id="closing_hours" name="closing_hours" min="00:00" max="24:00" required>

                    @error('closing_hours')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="opening_days" class="form-label">Working days</label>
                    <input type="text" id="opening_days" name="opening_days" required>

                    @error('opening_days')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            
                <label for="types" class="form-label">Select your cuisine</label><br>
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

                <div class="mb-3">
                    <label for="website" class="form-label">Restaurant's website</label>
                    <input type="url" id="website" name="website" placeholder="https://example.com"
                    pattern="https://.*" size="30"
                    required>

                    @error('website')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Give us a description of your business"></textarea>

                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            


            <div class="mb-3">
                <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" name="image" id="create_cover_image"
                    class="form-control  @error('image') is-invalid @enderror">

                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Crea</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>

    </form>
@endsection
