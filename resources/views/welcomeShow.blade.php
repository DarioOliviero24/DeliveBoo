@extends('layouts.guest')

@section('main-content')
    <div class="container py-5">
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('cart.show') }}" class="position-relative" style="text-decoration: none;">
                <i class="fas fa-shopping-cart fa-2x" style="color: var(--accent-color);"></i>
                @if(session()->has('cart') && count(session('cart')) > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill"
                          style="background-color: var(--secondary-color);">
                        {{ count(session('cart')) }}
                    </span>
                @endif
            </a>
        </div>

        <div class="card shadow-lg border-0" style="background: linear-gradient(145deg, #2a2a2a, #333333);">
            <div class="card-header py-3" style="background: linear-gradient(145deg, var(--secondary-color), #ff6b6b);">
                <h1 class="h3 mb-0 text-white text-center">
                    <i class="fas fa-utensils me-2"></i>{{ $restaurant->name }}
                </h1>
            </div>

            <div class="card-body p-4">
                <div class="row g-4">
                    @foreach ($plates as $plate)
                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm border-0 hover-card" style="background-color: rgba(255,255,255,0.05);">
                                @if($plate->img)
                                    <img src="{{ $plate->img }}"
                                         class="card-img-top"
                                         alt="{{ $plate->plate_name }}"
                                         style="height: 200px; object-fit: cover;">
                                @else
                                    <div class="bg-dark text-center py-5" style="background: linear-gradient(145deg, #1a1a1a, #2a2a2a);">
                                        <i class="fas fa-utensils fa-3x" style="color: var(--accent-color);"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <h3 class="card-title h5 mb-3" style="color: var(--accent-color);">{{ $plate->plate_name }}</h3>
                                    <p class="card-text text-light mb-3">
                                        <i class="fas fa-list me-2" style="color: var(--secondary-color);"></i>
                                        {{ $plate->ingredients }}
                                    </p>
                                    <p class="card-text mb-3">
                                        <i class="fas fa-tag me-2" style="color: var(--secondary-color);"></i>
                                        <span style="color: var(--accent-color); font-weight: bold;">
                                            €{{ number_format($plate->price, 2) }}
                                        </span>
                                    </p>
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="plate_id" value="{{ $plate->id }}">
                                        <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                                        <button type="submit" class="btn btn-warning w-100">
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
            <a href="{{ route('home') }}" class="btn btn-outline-warning">
                <i class="fas fa-arrow-left me-2"></i>
                Torna alla home
            </a>
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

        .btn-outline-warning {
            color: var(--accent-color);
            border-color: var(--accent-color);
            transition: all 0.3s ease;
        }
        .btn-outline-warning:hover {
            background-color: var(--accent-color);
            color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
    </style>
@endsection
