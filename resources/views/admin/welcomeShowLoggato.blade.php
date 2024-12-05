@extends('layouts.app')

@section('main-content')
<div class="container py-5">
    <div class="card shadow-lg border-0">
        <div class="card-body p-5">
            <h1 class="display-4 text-center mb-5">{{ $restaurant->name }}</h1>

            <div class="row g-4">
                @foreach ($plates as $plate)
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body text-center p-4">
                                <h2 class="h4 mb-3">{{ $plate->plate_name }}</h2>
                                <p class="text-muted mb-3">
                                    <i class="fas fa-list me-2"></i>{{ $plate->ingredients }}
                                </p>
                                <p class="text-danger h5">
                                    <i class="fas fa-tag me-2"></i>${{ number_format($plate->price, 2) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('welcomeLoggato.index') }}"
                   class="btn btn-outline-danger btn-lg">
                    <i class="fas fa-arrow-left me-2"></i>Indietro
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
