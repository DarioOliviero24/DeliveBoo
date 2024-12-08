@extends('layouts.app')

@section('page-title', 'Menu Ristorante')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0" style="background: linear-gradient(145deg, #2a2a2a, #333333);">
                <div class="card-header py-3" style="background: linear-gradient(145deg, var(--secondary-color), #ff6b6b);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="h3 mb-0 text-white">
                            <i class="fas fa-utensils me-2"></i>Menu di {{ $restaurant->name }}
                        </h1>
                        <a href="{{ route('admin.plates.create', $restaurant->id) }}"
                           class="btn btn-warning">
                            <i class="fas fa-plus me-2"></i>Nuovo Piatto
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        @foreach ($plates as $plate)
                            <div class="col-md-6">
                                <div class="card h-100 shadow-sm border-0 hover-card" style="background-color: rgba(255,255,255,0.05);">
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
                                        <div class="bg-dark text-center py-5" style="background: linear-gradient(145deg, #1a1a1a, #2a2a2a);">
                                            <i class="fas fa-utensils fa-3x" style="color: var(--accent-color);"></i>
                                        </div>
                                    @endif
                                    <div class="card-body">
                                        <h3 class="card-title h5 mb-3" style="color: var(--accent-color);">{{ $plate->plate_name }}</h3>
                                        <div class="ingredients-section mb-3">
                                            <small class="d-block mb-2" style="color: var(--secondary-color);">
                                                <i class="fas fa-list me-2"></i>Ingredienti:
                                            </small>
                                            <p class="card-text text-light">{{ $plate->ingredients }}</p>
                                        </div>
                                        <div class="price-section mb-3">
                                            <p class="card-text h5" style="color: #ffffff;">
                                                <i class="fas fa-tag me-2" style="color: var(--accent-color);"></i>
                                                <span style="color: var(--secondary-color);">€{{ number_format($plate->price, 2) }}</span>
                                            </p>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.restaurants.edit', $plate->id) }}"
                                               class="btn btn-warning btn-sm">
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

<style>
.hover-card {
    transition: all 0.3s ease;
    border: 1px solid rgba(255,255,255,0.1);
}

.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0,0,0,0.3);
    border-color: var(--accent-color);
}

.btn-warning {
    background-color: var(--accent-color);
    border: none;
    color: var(--primary-color);
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-warning:hover {
    background-color: #ffc107;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.btn-outline-light:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}
</style>
@endsection
