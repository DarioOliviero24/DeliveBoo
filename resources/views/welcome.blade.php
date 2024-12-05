@extends('layouts.guest')

@section('main-content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                <form action="{{ route('home.filter') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <select class="form-select" name="tipologia">
                            @foreach ($categorieList as $categoria)
                                <option value="{{ $categoria }}"
                                    {{ (isset($selectedCategory) && $selectedCategory == $categoria) ? 'selected' : '' }}>
                                    {{ ucfirst($categoria) }}
                                </option>
                            @endforeach
                        </select>
                        <button class="btn btn-outline-secondary" type="submit">Cerca</button>
                    </div>
                </form>

                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($restaurants as $restaurant)
                        <div class="col">
                            <div class="card h-100 shadow-sm hover-shadow" style="transition: all 0.3s ease;">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">{{ $restaurant->name }}</h5>
                                    <p class="card-text">
                                        <i class="fas fa-map-marker-alt text-secondary me-2"></i>
                                        {{ $restaurant->address }}
                                    </p>
                                    <p class="card-text">
                                        <i class="fas fa-utensils text-secondary me-2"></i>
                                        @foreach ($restaurant->categories as $category)
                                            <span class="badge bg-primary me-1">{{ $category->tipologia }}</span>
                                        @endforeach
                                    </p>
                                    <a href="{{ route('home.show', $restaurant->id) }}"
                                       class="btn btn-outline-primary w-100">
                                        <i class="fas fa-book-open me-2"></i>Visualizza Menu
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($restaurants->isEmpty())
                    <div class="alert alert-info text-center mt-4">
                        <i class="fas fa-info-circle me-2"></i>
                        Nessun ristorante trovato per questa categoria.
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
        }
    </style>
@endsection