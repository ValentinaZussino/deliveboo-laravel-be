<h1>Grazie per il tuo ordine <span class="font-italic">{{ $order->name }} {{ $order->last_name }}</span> !</h1>

<h2>Riepilogo dell'ordine:</h2>

<ul>
    <li>Indirizzo fornito: {{ $order->address}}</li>
    @if($order->phone)
    <li>Recapito telefonico: {{$order->phone}}</li>
    @endif
    <li>Totale dell'ordne: {{ $order->total_amount }} &euro;</li>
    <li>Data dell'ordine: {{ $order->date}}</li>
    <li>Pagato: {{$order->payed == 1 ? 'Sì' : 'No'}}</li>
</ul>

<p>Il Team di Code_Eat</p>