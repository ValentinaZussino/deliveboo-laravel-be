{{-- @extends('layouts.app') --}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />
    <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">

    <!-- Usando chartjs. -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<div id="admin">
    @include('partials.admin.sidebar')
    <div id="wrapper-admin">
        {{-- @section('content') --}}

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>
        
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
        
                            {{ __('Sei riuscito a loggare!') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 text-center">
                <h1>{{$restaurant->name}}</h1>
            </div>
            <div>
                <div class="d-flex justify-content-center ">
                    @if ($restaurant->image)
                   <img class="card-img-top mb-5 mb-md-0 w-50" src="{{ asset('storage/'.$restaurant->image) }}" alt="{{$restaurant->name}}">
                   @else
                       <img class="img-fluid rounded-start" src="{{ asset('img/no-image.jpg') }}" alt="{{$restaurant->name}}">
                   @endif
               </div>
            </div>
            
            <div class="container mt-5">
                <h1>Statistiche ordini</h1>
                <canvas id="myChart"></canvas>
            </div>
            
        </div>
    </div>
</div>

<script>
    Chart.defaults.font.size = 15;
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($totalDay->pluck('date')->toArray()) !!},
            datasets: [{
                    label: 'Incassi giornalieri',
                    data: {!! json_encode($totalDay->pluck('total')->toArray()) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                        ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                        ],
                    borderWidth: 1
                },
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value, index, ticks) {
                            return  value + ' €';
                        }
                    }
                },
            },
            
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 22
                        },
                        color: 'black',
                    }
                },
            }
        }
    });
</script>
{{-- @endsection --}}
