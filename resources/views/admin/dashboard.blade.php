@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body p-5">
                    <h1 class="display-4 mb-4">Benvenuto nella tua Area Personale</h1>
                    <p class="lead text-muted">Usa il menu in alto per navigare tra le diverse sezioni</p>
                    <hr class="my-4">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a href="{{ route('admin.restaurants.index') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-utensils me-2"></i>I tuoi Ristoranti
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
