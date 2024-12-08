@extends('layouts.app')

@section('main-content')
<div class="container py-5">
    <div class="card shadow-lg border-0" style="background-color: #2a2a2a;">
        <div class="card-body p-5">
            <h1 class="display-4 text-center mb-4">
                <span style="color: var(--accent-color); text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                    Benvenuto su DeliveBoo
                </span>
                <div style="color: var(--secondary-color); font-size: 0.8em;">
                    {{ Auth::user()->name }}
                </div>
            </h1>

            <div class="row justify-content-center mb-4">
                <div class="col-md-4">
                    <form action="{{ route('admin.welcomeLoggato.filter') }}" method="GET">
                        <div class="input-group">
                            <select class="form-select custom-select" id="inputGroupSelect01" name="tipologia">
                                @foreach ($categorieList as $category)
                                    <option value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-filter me-2"></i>Cerca
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($restaurants as $restaurant)
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm border-0 hover-card" style="background-color: #333333;">
                            <div class="card-body text-center p-4">
                                <h5 class="card-title h4 mb-3" style="color: var(--accent-color);">
                                    {{ $restaurant->name }}
                                </h5>
                                <p class="text-light opacity-75 mb-3">
                                    <i class="fas fa-map-marker-alt me-2" style="color: var(--secondary-color);"></i>
                                    {{ $restaurant->address }}
                                </p>
                                <div class="mb-3">
                                    @foreach ($restaurant->categories as $category)
                                        <span class="badge me-2" style="background-color: var(--secondary-color); color: white;">
                                            {{ $category->tipologia }}
                                        </span>
                                    @endforeach
                                </div>
                                <a href="{{ route('welcomeLoggato.show', $restaurant->id) }}"
                                   class="btn btn-warning">
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
.hover-card {
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
}

.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.3) !important;
    border: 1px solid var(--accent-color) !important;
}

.custom-select {
    background-color: #333333;
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.custom-select:focus {
    background-color: #404040;
    color: white;
    border-color: var(--accent-color);
    box-shadow: none;
}

.badge {
    font-weight: 500;
    padding: 0.5rem 1rem;
    text-transform: capitalize;
}

.btn-warning {
    background-color: var(--accent-color);
    border: none;
    color: var(--primary-color);
    font-weight: 600;
}

.btn-warning:hover {
    background-color: #ffc107;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}
</style>
@endsection

