@extends('layouts.guest')

@section('main-content')
    <div class="container py-5">
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('cart.show') }}" class="position-relative text-dark" style="text-decoration: none;">
                <i class="fas fa-shopping-cart fa-2x"></i>
                @if(session()->has('cart') && count(session('cart')) > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ count(session('cart')) }}
                    </span>
                @endif
            </a>
        </div>

        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white py-3">
                <h1 class="h3 mb-0 text-center">{{ $restaurant->name }}</h1>
            </div>

            <div class="card-body p-4">
                <div class="row g-4">
                    @foreach ($plates as $plate)
                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm border-0 hover-shadow">
                                <div class="card-body">
                                    <h3 class="card-title h5 mb-3">{{ $plate->plate_name }}</h3>
                                    <p class="card-text mb-2">
                                        <i class="fas fa-utensils text-secondary me-2"></i>
                                        {{ $plate->ingredients }}
                                    </p>
                                    <p class="card-text text-danger fw-bold">
                                        <i class="fas fa-tag me-2"></i>
                                        €{{ number_format($plate->price, 2) }}
                                    </p>
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="plate_id" value="{{ $plate->id }}">
                                        <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                                        <button type="submit" class="btn btn-success w-100">
                                            <i class="fas fa-cart-plus me-2"></i>
                                            Aggiungi al carrello
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>
                Torna alla home
            </a>
        </div>
    </div>

    <style>
        .hover-shadow {
            transition: all 0.3s ease;
        }
        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
        }
    </style>
@endsection
