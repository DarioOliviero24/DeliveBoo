@extends('layouts.guest')

@section('main-content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                        <button class="btn btn-outline-secondary" type="submit">Filtra</button>
                    </div>
                </form>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($restaurants as $restaurant)
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $restaurant->name }}</h5>
                                    <p class="card-text">
                                        <strong>Indirizzo:</strong> {{ $restaurant->address }}
                                    </p>
                                    <p class="card-text">
                                        <strong>Categorie:</strong>
                                        @foreach ($restaurant->categories as $category)
                                            <span class="badge bg-secondary me-1">{{ $category->tipologia }}</span>
                                        @endforeach
                                    </p>
                                    <a href="{{ route('home.show', $restaurant->id) }}"
                                       class="btn btn-primary">
                                        Vedi Menu
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($restaurants->isEmpty())
                    <div class="alert alert-info text-center mt-4">
                        Nessun ristorante trovato per questa categoria.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection


