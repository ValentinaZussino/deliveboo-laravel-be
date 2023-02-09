@extends('layouts.app')

@section('content')
<!-- Section: Design Block -->
<section class="text-center text-lg-start">
    <style>

      .container-register{
        margin-top: 100px
      }
      .cascading-right {
        margin-right: -50px;
      }
  
      @media (max-width: 991.98px) {
        .cascading-right {
          margin-right: 0;
        }
      }
    </style>
  
    <!-- Jumbotron -->
    <div class="container container-register py-4 ">
      <div class="row g-0 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card cascading-right" style="
              background: hsla(0, 0%, 100%, 0.55);
              backdrop-filter: blur(30px);
              ">
            <div class="card-body p-5 shadow-5 text-center">
              <h2 class="fw-bold mb-5">Iscriviti ora</h2>
              <form method="POST" action="{{ route('register') }}">
                @csrf
                 <!-- 2 column grid layout with text inputs for the first and last names -->
                 <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      <label class="form-label" for="form3Example1">Nome</label>
                      
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
  
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example2" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                      <label class="form-label" for="form3Example2">Cognome</label>
  
                      @error('surname')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
  
                    </div>
                  </div>
                </div>
                
  
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>Email già registrata</strong>
                  </span>
                  @enderror
  
                  <label class="form-label" for="form3Example3">Email </label>
                </div>
  
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>Le password non corrispondono</strong>
                  </span>
                  @enderror
  
                  <label class="form-label" for="form3Example4">Password</label>
                </div>
  
  
                <!-- Password confirm -->
                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  
  
                  <label class="form-label" for="form3Example4">Conferma Password</label>
                </div>
  
                
  
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                  Registrati
                </button>
  
                
              </form>
            </div>
          </div>
        </div>
  
        <div class="col-lg-6 mb-5 mb-lg-0">
          <img src={{url('/img/pexels-photo-3028127.jpeg')}} class="w-100 rounded-4 shadow-4"
            alt="" />
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
  </section>
  <!-- Section: Design Block -->
@endsection
