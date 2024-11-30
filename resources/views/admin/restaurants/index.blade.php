@extends('layouts.app')

@section('page-title', 'Restaurants')

@section('main-content')
    <h1>Restaurants</h1>
    <ul class="list-group">
        @foreach ($restaurants as $restaurant)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $restaurant->name }}
                <a href="{{ route('admin.restaurants.show', $restaurant->id) }}" class="btn btn-outline-primary btn-sm">
                    Visualizza Ristorante
                </a>
            </li>
        @endforeach
    </ul>
@endsection
