@extends('layouts.app')

@section('page-title', 'I tuoi Ristoranti')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0" style="background: linear-gradient(145deg, #2a2a2a, #333333);">
                <div class="card-header py-3" style="background: linear-gradient(145deg, var(--secondary-color), #ff6b6b);">
                    <h1 class="h3 mb-0 text-white">I tuoi Ristoranti</h1>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @foreach ($restaurants as $restaurant)
                            <li class="list-group-item p-3 d-flex justify-content-between align-items-center hover-item"
                                style="background-color: rgba(255,255,255,0.05); border-bottom: 1px solid rgba(255,255,255,0.1);">
                                <div class="d-flex align-items-center">
                                    <div class="icon-circle me-3">
                                        <i class="fas fa-store" style="color: var(--accent-color);"></i>
                                    </div>
                                    <h5 class="mb-0 text-white">{{ $restaurant->name }}</h5>
                                </div>
                                <a href="{{ route('admin.restaurants.show', $restaurant->id) }}"
                                   class="btn btn-warning btn-sm">
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

<style>
.hover-item {
    transition: all 0.3s ease;
}

.hover-item:hover {
    background-color: rgba(255,255,255,0.1) !important;
    transform: translateX(10px);
}

.icon-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255, 215, 0, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
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

.card {
    border: 1px solid rgba(255,255,255,0.1);
    box-shadow: 0 8px 32px rgba(0,0,0,0.3);
}
</style>
@endsection


