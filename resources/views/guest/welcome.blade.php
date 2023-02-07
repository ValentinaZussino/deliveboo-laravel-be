@extends('layouts.app')
@section('content')

<section id="hero">
    <section id="hero-section">
        <div class="titolo">
            <h1>Diventa un partner di Code_eat</h1>
            <h2>Fai crescere la tua attività online</h2>
            <a class="my-btn mt-4" href="{{ route('register') }}">Inizia</a>
        </div>
    </section>
    <section id="servizi" class="container-fluid pt-5 pb-5">
        <section class="container">
            <div class="col-12 text-center">
                <p class="display-5 fw-semibold">
                    Trova la soluzione migliore per la tua attività
                </p>
            </div>
            <div class="row">
                <div class="cards-list">
                    <div class="my-card">
                        <div class="card-image">
                            <img src="{{ asset('img/vendi-1.jpg') }}" />
                        </div>
                        <div class="card-title title-white">
                            <p>Vendi a nuovi clienti e raggiungi nuovi quartieri</p>
                        </div>
                    </div>
        
                    <div class="my-card">
                        <div class="card-image">
                            <img src="{{ asset('img/gestisci-1.jpg') }}" />
                        </div>
                        <div class="card-title title-white">
                            <p>Gestisci il tuo ristorante online</p>
                        </div>
                    </div>
        
                    <div class="my-card">
                        <div class="card-image">
                            <img src="{{ asset('img/menu-1.jpg') }}" />
                        </div>
                        <div class="card-title">
                            <p>Aumenta le vendite ottimizzando il tuo menù</p>
                        </div>
                    </div>
        </section>
    </section>
</section>

@endsection
