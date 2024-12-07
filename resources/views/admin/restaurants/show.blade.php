@extends('layouts.app')

@section('page-title', 'Restaurants')

@section('main-content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
                    <h1 class="h3 mb-0">Menu di {{ $restaurant->name }}</h1>
                    <a href="{{ route('admin.plates.create', $restaurant->id) }}"
                       class="btn btn-light">
                        <i class="fas fa-plus me-2"></i>Nuovo Piatto
                    </a>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        @foreach ($plates as $plate)
                            <div class="col-md-6">
                                <div class="card h-100 shadow-sm border-0 rounded-3">
                                    @if($plate->img)
                                        @if(str_starts_with($plate->img, 'plates/'))
                                            <img src="{{ asset('storage/' . $plate->img) }}"
                                                 class="card-img-top"
                                                 alt="{{ $plate->plate_name }}"
                                                 style="height: 200px; object-fit: cover;">
                                        @else
                                            <img src="{{ $plate->img }}"
                                                 class="card-img-top"
                                                 alt="{{ $plate->plate_name }}"
                                                 style="height: 200px; object-fit: cover;">
                                        @endif
                                    @else
                                        <div class="bg-light text-center py-5">
                                            <i class="fas fa-utensils fa-3x text-secondary"></i>
                                        </div>
                                    @endif
                                    <div class="card-body">
                                        <h3 class="card-title h5 mb-3">{{ $plate->plate_name }}</h3>
                                        <p class="card-text mb-2">
                                            <small class="text-muted">Ingredienti:</small><br>
                                            {{ $plate->ingredients }}
                                        </p>
                                        <p class="card-text text-danger fw-bold">
                                            €{{ number_format($plate->price, 2) }}
                                        </p>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.restaurants.edit', $plate->id) }}"
                                               class="btn btn-outline-primary btn-sm">
                                                <i class="fas fa-edit me-1"></i>Modifica
                                            </a>
                                            <form action="{{ route('admin.plates.destroy', $plate->id) }}"
                                                  method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                                                <input type="hidden" name="plate_id" value="{{ $plate->id }}">
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="fas fa-trash me-1"></i>Cancella
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
