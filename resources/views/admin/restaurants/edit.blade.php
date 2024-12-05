@extends('layouts.app')

@section('page-title', 'Restaurants')

@section('main-content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h3 mb-0">Modifica Piatti {{ $restaurant->name }}</h1>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.restaurants.update', $plate->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="plate_name" class="form-label fw-bold">Nome del piatto:</label>
                                <input type="text" id="plate_name" name="plate_name" value="{{ $plate->plate_name }}" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="ingredients" class="form-label fw-bold">Ingredienti:</label>
                                <input type="text" id="ingredients" name="ingredients" value="{{ $plate->ingredients }}" class="form-control">
                            </div>

                            <div class="mb-4">
                                <label for="price" class="form-label fw-bold">Prezzo:</label>
                                <input type="number" id="price" name="price" value="{{ $plate->price }}" class="form-control" step="0.01" min="0">
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    Salva
                                </button>
                                <a href="{{ route('admin.restaurants.show', $restaurant->id) }}" class="btn btn-outline-danger">
                                    Torna indietro
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
