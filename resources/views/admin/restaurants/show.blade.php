@extends('layouts.app')

@section('page-title', 'Restaurants')

@section('main-content')
    <h1 class="mb-4 py-3">Piatti del ristorante {{ $restaurant->name }}</h1>
    <a href="{{ route('admin.plates.create', $restaurant->id) }}" class="btn btn-primary">
        Create
    </a>
    <ul class="list-group py-5">
        @foreach ($plates as $plate)
            <li class="list-group-item" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #F5FFFA; padding: 20px; border-radius: 10px; margin:10px 0;">
                <h3>{{ $plate->plate_name }}</h3>
                <p><strong>Ingredienti:</strong> {{ $plate->ingredients }}</p>
                <p><strong style="color: red">Prezzo:</strong> €{{ number_format($plate->price, 2) }}</p>
                <a href="{{ route('admin.restaurants.edit', $plate->id) }}" class="btn btn-primary btn-sm" style="margin: 10px 0px;">
                    Modifica
                </a>

                <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                    <input type="hidden" name="plate_id" value="{{ $plate->id }}">
                    <button type="submit" class="btn btn-danger btn-sm">
                        Elimina
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
