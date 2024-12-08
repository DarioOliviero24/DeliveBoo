@extends('layouts.guest')

@section('main-content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
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

                <form action="{{ route('home.filter') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <select class="form-select custom-select" name="tipologia">
                            @foreach ($categorieList as $categoria)
                                <option value="{{ $categoria }}"
                                    {{ (isset($selectedCategory) && $selectedCategory == $categoria) ? 'selected' : '' }}>
                                    {{ ucfirst($categoria) }}
                                </option>
                            @endforeach
                        </select>
                        <button class="btn btn-warning" type="submit">
                            <i class="fas fa-search me-2"></i>Cerca
                        </button>
                    </div>
                </form>

                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($restaurants as $restaurant)
                        <div class="col">
                            <div class="card h-100 shadow-sm hover-card" style="background: linear-gradient(145deg, #2a2a2a, #333333);">
                                <div class="card-body">
                                    <h5 class="card-title mb-3" style="color: var(--accent-color);">
                                        <i class="fas fa-store me-2"></i>{{ $restaurant->name }}
                                    </h5>
                                    <p class="card-text text-light mb-3">
                                        <i class="fas fa-map-marker-alt me-2" style="color: var(--secondary-color);"></i>
                                        {{ $restaurant->address }}
                                    </p>
                                    <p class="card-text mb-4">
                                        <i class="fas fa-utensils me-2" style="color: var(--secondary-color);"></i>
                                        @foreach ($restaurant->categories as $category)
                                            <span class="badge me-1" style="background-color: var(--secondary-color);">
                                                {{ $category->tipologia }}
                                            </span>
                                        @endforeach
                                    </p>
                                    <a href="{{ route('home.show', $restaurant->id) }}"
                                       class="btn btn-warning w-100">
                                        <i class="fas fa-book-open me-2"></i>Visualizza Menu
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($restaurants->isEmpty())
                    <div class="alert" style="background: rgba(255,215,0,0.1); border-color: var(--accent-color); color: var(--accent-color);">
                        <i class="fas fa-info-circle me-2"></i>
                        Nessun ristorante trovato per questa categoria.
                    </div>
                @endif
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

        .custom-select {
            background-color: #333333;
            border: 1px solid rgba(255,255,255,0.1);
            color: white;
        }

        .custom-select:focus {
            background-color: #404040;
            border-color: var(--accent-color);
            color: white;
            box-shadow: none;
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
    </style>
@endsection

