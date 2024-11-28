@extends('layouts.app')

@section('page-title', 'Restaurants')

@section('main-content')
    <h1 class="mb-4">Modifica Piatti del ristorante {{ $restaurant->name }}</h1>
    <ul class="list-group">
        @foreach ($plates as $plate)
            <li class="list-group-item">
                <h5>{{ $plate->plate_name }}</h5>
                <p><strong>Ingredienti:</strong> {{ $plate->ingredients }}</p>
                <p><strong>Prezzo:</strong> €{{ number_format($plate->price, 2) }}</p>
                <a href="{{ route('admin.restaurants.edit', $plate->id) }}" class="btn btn-primary btn-sm">Modifica</a>
            </li>
        @endforeach
    </ul>


@endsection