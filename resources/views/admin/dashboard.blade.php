@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card shadow-lg border-0" style="background: linear-gradient(145deg, #2a2a2a, #333333);">
                <div class="card-body p-5">
                    <h1 class="display-4 mb-4" style="color: var(--accent-color); text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                        Benvenuto nella tua Area Personale
                    </h1>
                    <p class="lead text-light opacity-75">Usa il menu in alto per navigare tra le diverse sezioni</p>
                    <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a href="{{ route('admin.restaurants.index') }}" class="btn btn-warning btn-lg">
                            <i class="fas fa-utensils me-2"></i>I tuoi Ristoranti
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
