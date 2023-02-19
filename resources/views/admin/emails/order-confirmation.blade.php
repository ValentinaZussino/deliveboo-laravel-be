<h1>Grazie per il tuo ordine <span style="text-transform: capitalize; font-style: italic;">{{ $order->name }} {{ $order->last_name }}</span> !</h1>

<p><strong>Piatti ordinati:</strong></p>
    <ul>
        @foreach($order->plates as $plate)
            <li>{{ $plate->name }} <br> <span>Quantità:</span> x<span class="fw-bold">{{ $plate->pivot->quantity }}</span> </li>
        @endforeach
    </ul>
<p><strong>Indirizzo fornito: </strong>{{ $order->address}}</p>
@if($order->phone)
<p><strong>Recapito telefonico: </strong>{{$order->phone}}</p>
@endif
<p><strong>Totale dell'ordine: </strong>{{ $order->total_amount }} &euro;</p>
<p><strong>Pagato: </strong>{{$order->payed == 1 ? 'Sì' : 'No'}}</p>
<p><strong>Data dell'ordine: </strong>{{date('d/m/y H:i:s',strtotime($order->created_at)) }}</p>

<p>Il Team di Code_Eat</p>