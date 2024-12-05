@extends('layouts.app')

@section('page-title', 'Restaurants')

@section('main-content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h1 class="h3 mb-0">I tuoi Ristoranti</h1>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @foreach ($restaurants as $restaurant)
                            <li class="list-group-item p-3 d-flex justify-content-between align-items-center hover-bg-light">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-store me-3 text-primary"></i>
                                    <h5 class="mb-0">{{ $restaurant->name }}</h5>
                                </div>
                                <a href="{{ route('admin.restaurants.show', $restaurant->id) }}"
                                   class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-eye me-2"></i>Visualizza Menu
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
