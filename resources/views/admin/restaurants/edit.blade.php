@extends('layouts.app')

@section('page-title', 'Restaurants')

@section('main-content')
    <h1 class="mb-4">Modifica Piatti {{ $restaurant->name }}</h1>
    <ul class="list-group">
        <li>
            <form action="{{ route('admin.restaurants.update', $plate->id) }}" method="POST">
                @csrf
                @method('PUT')
                <strong>Nome del piatto:</strong> <input type="text" name="plate_name" value="{{ $plate->plate_name }}" class="form-control"><br>
                @foreach ($ingredients as $ingredient)
                        <input type="checkbox" name="ingredients[]" value="{{ $ingredient }}"
                            @if(in_array($ingredient, $existingIngredients)) checked @endif> {{ $ingredient }}<br>
                @endforeach
                <strong>Prezzo:</strong> <input type="number" name="price" value="{{ $plate->price }}" class="form-control" step="0.01" min="0">
                <button type="submit" class="btn btn-primary btn-sm" style="margin: 20px 0;">
                    Salva
                </button>
            </form>
                <a href="{{ route('admin.restaurants.show', $restaurant->id) }}" class="btn btn-danger btn-sm">
                    Torna indietro
                </a>
    </ul>


@endsection
