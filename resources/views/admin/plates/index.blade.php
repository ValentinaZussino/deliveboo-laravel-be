@extends('layouts.admin')
@section('content')
<div>
    <h1>Piatti</h1>
    {{-- messages --}}
    @if(session()->has('message'))
    <div class="alert alert-success mb-3 mt-3 w-75 m-auto text-capitalize">
        {{ session()->get('message') }}
    </div>
    @endif
    {{-- alla create --}}
    <a class="btn btn-primary mb-2" href="{{route('admin.plates.create')}}">Aggiungi piatto <i class="fa-solid fa-plus"></i></a>
    {{-- tabella --}}
    <div class="card">
        <table class="table table-striped mb-2">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th class="bl-hidden" scope="col">Prezzo</th>
                    <th class="bl-hidden" scope="col" style="width: 130px">Visibile sul sito</th>
                    <th class="bl-hidden" scope="col">Ingredienti</th>
                    <th scope="col">Modifica</th>
                    <th scope="col">Elimina</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($plates as $plate)
                    <tr>
                        <td><a href="{{route('admin.plates.show', $plate->slug)}}" title="View plate" class="text-capitalize">{{$plate->name}}</a></td>
                        <td class="bl-hidden">{{$plate->price}}&nbsp;&euro;</td>
                        <td class="bl-hidden">{{$plate->available == 1 ? 'Sì' : 'No'}}</td>
                        <td class="bl-hidden">{{$plate->ingredients}}</td>
                        <td><a class="link-secondary" href="{{route('admin.plates.edit', $plate->slug)}}" title="Edit plate"><i class="fa-solid fa-pen"></i></a></td>
                        <td>
                            <form action="{{route('admin.plates.destroy', $plate->slug)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$plate->name}}"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $plates->links('vendor.pagination.bootstrap-5') }} --}}
        @include('partials.admin.modal-delete')
    </div>
</div>


<style>
    a{
        text-decoration: none;
        font-weight: 700;
        color: black;
    }
    a:hover{
        color: #ec0b43;
    }

    .fa-pen:hover{
        color: #ec0b43;
    }

</style>

@endsection