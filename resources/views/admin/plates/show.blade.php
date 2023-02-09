@extends('layouts.admin')
@section('content')

<div class="container pt-5">
	<div class="card" >
		<div class="row g-0">
			<div class="col-md-4">
				@if ($plate->image)
					<img class="img-fluid rounded-start" src="{{ asset('storage/' . $plate->image) }}" alt="{{$plate->name}}">
				@else
					<img class="img-fluid rounded-start" src="{{ asset('img/no-image.jpg') }}" alt="No image">
				@endif
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title">{{$plate->name}}</h5>
					<hr>
					<p class="card-text"><span class="fw-semibold">Ingredienti: </span>{{$plate->ingredients}}</p>
					<p class="card-text"><span class="fw-semibold">Categoria: </span>{{$plate->category->name}}</p>
	
					@if ($plate->allergens)
						<p class="card-text"><span class="fw-semibold">Allergeni: </span>{{$plate->allergens}}</p>
					@endif

					@if ($plate->size)
						<p class="card-text"><span class="fw-semibold">Porzione: </span>{{$plate->size}}</p>
					@endif
					
					<p class="card-text"><span class="fw-semibold">Visibile sul sito: </span>{{$plate->available == 1 ? 'Sì' : 'No'}}</p>
		
					<a class="button-red" href="{{route('admin.plates.index')}}">Torna ai piatti</a>
				</div>
			</div>
		</div>
	</div>

</div>

<style>
.button-red {
  border: none;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  padding: 10px 15px;
  border-radius: 12px;
  background-color: white;
  color: black;
  border: 2px solid #ec0b43;
}
.button-red:hover {
  background-color: #ec0b43;
  color: black;
}
</style>

@endsection