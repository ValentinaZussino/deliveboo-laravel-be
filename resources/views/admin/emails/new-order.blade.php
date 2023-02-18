<h1>Hai ricevuto un nuovo ordine!</h1>

<h2>Riepilogo dell'ordine:</h2>

<p><strong>Nome e cognome del Cliente: </strong>{{ $order->name }}, {{ $order->last_name }}</p>
<br>
<p><strong>Piatti ordinati:</strong></p>
    <ul>
        @foreach($order->plates as $plate)
            <li>{{ $plate->name }} <br> <span>Quantità:</span> x<span class="fw-bold">{{ $plate->pivot->quantity }}</span> </li>
        @endforeach
    </ul>
<br>
<p> <strong>Indirizzo fornito: </strong>{{ $order->address}}</p>
@if($order->phone)
<p><strong>Recapito telefonico: </strong>{{$order->phone}}</p>
@endif
<p><strong>Totale dell'ordine: </strong>{{ $order->total_amount }} &euro;</p>
<p><strong>Pagato: </strong>{{$order->payed == 1 ? 'Sì' : 'No'}}</p>
<p><strong>Data dell'ordine: </strong>{{date('d/m/y H:i:s',strtotime($order->created_at)) }}</p>

<p>Il Team di Code_Eat</p>