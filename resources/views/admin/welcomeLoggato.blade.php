@extends('layouts.app')

@section('main-content')
<div class="container py-5">
    <div class="card shadow-lg border-0">
        <div class="card-body p-5">
            <h1 class="display-4 text-center mb-4">
                Benvenuto su DeliveBoo
                <div class="text-danger">{{ Auth::user()->name }}</div>
            </h1>

            <div class="row justify-content-center mb-4">
                <div class="col-md-4">
                    <form action="{{ route('admin.welcomeLoggato.filter') }}" method="GET">
                        <div class="input-group">
                            <select class="form-select" id="inputGroupSelect01" name="tipologia">
                                @foreach ($categorieList as $category)
                                    <option value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-filter me-2"></i>Cerca
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($restaurants as $restaurant)
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm border-0 hover-shadow">
                            <div class="card-body text-center p-4">
                                <h5 class="card-title h4 mb-3">{{ $restaurant->name }}</h5>
                                <p class="text-muted mb-3">
                                    <i class="fas fa-map-marker-alt me-2"></i>{{ $restaurant->address }}
                                </p>
                                <div class="mb-3">
                                    @foreach ($restaurant->categories as $category)
                                        <span class="badge bg-light text-dark me-2">{{ $category->tipologia }}</span>
                                    @endforeach
                                </div>
                                <a href="{{ route('welcomeLoggato.show', $restaurant->id) }}"
                                   class="btn btn-outline-success">
                                    <i class="fas fa-utensils me-2"></i>Visualizza Menu
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
.hover-shadow:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease;
}
</style>
@endsection
