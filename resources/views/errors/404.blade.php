@extends('layouts.app')

@section('content')
<section class="error-container d-flex justify-content-center align-items-center pt-5">
    <div class="blobtainer col-8">
        <div class="blob"></div>
    </div>        
    <div class="error-message">
        <img src="{{ asset('img/error404.png') }}" alt="Pagina non trovata" />
        <p>Ops! Sembra che tu abbia sbagliato strada. Qui non c'è nulla da vedere, a parte questo simpatico pasticciere che a quanto pare si è perso anche lui. Ma non temere, basta premere il pulsante magico qui sotto e tornerai alla giusta rotta!</p>
        <button class="m-auto" onclick="window.location.href='/'">Torna alla Home</button>
    </div>
</section>
@endsection