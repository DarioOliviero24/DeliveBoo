@extends('layouts.app')

@section('main-content')
<div class="container py-5">
    <div class="card shadow-lg border-0" style="background-color: #2a2a2a;">
        <div class="card-body p-5">
            <h1 class="display-4 text-center mb-5" style="color: var(--accent-color); text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                {{ $restaurant->name }}
            </h1>

            <div class="row g-4">
                @foreach ($plates as $plate)
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm border-0 hover-card" style="background-color: #333333;">
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
                            <div class="card-body text-center p-4">
                                <h2 class="h4 mb-3" style="color: var(--accent-color);">{{ $plate->plate_name }}</h2>
                                <p class="text-light opacity-75 mb-3">
                                    <i class="fas fa-list me-2" style="color: var(--secondary-color);"></i>
                                    {{ $plate->ingredients }}
                                </p>
                                <p class="h5 mb-3" style="color: var(--accent-color);">
                                    <i class="fas fa-tag me-2" style="color: var(--secondary-color);"></i>
                                    €{{ number_format($plate->price, 2) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('welcomeLoggato.index') }}"
                   class="btn btn-outline-warning">
                    <i class="fas fa-arrow-left me-2"></i>Indietro
                </a>
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
</style>
@endsection
