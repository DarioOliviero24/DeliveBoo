@extends('layouts.app')

@section('page-title', 'Modifica Piatto')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0" style="background: linear-gradient(145deg, #2a2a2a, #333333);">
                <div class="card-header py-3" style="background: linear-gradient(145deg, var(--secondary-color), #ff6b6b);">
                    <h1 class="h3 mb-0 text-white">
                        <i class="fas fa-edit me-2"></i>
                        Modifica Piatto - <span style="color: var(--accent-color);">{{ $restaurant->name }}</span>
                    </h1>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('admin.restaurants.update', $plate->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="plate_name" class="form-label" style="color: var(--accent-color);">
                                <i class="fas fa-utensils me-2"></i>Nome del piatto
                            </label>
                            <input type="text"
                                   id="plate_name"
                                   name="plate_name"
                                   value="{{ $plate->plate_name }}"
                                   class="form-control custom-input">
                        </div>

                        <div class="mb-4">
                            <label for="ingredients" class="form-label" style="color: var(--accent-color);">
                                <i class="fas fa-list me-2"></i>Ingredienti
                            </label>
                            <input type="text"
                                   id="ingredients"
                                   name="ingredients"
                                   value="{{ $plate->ingredients }}"
                                   class="form-control custom-input">
                        </div>

                        <div class="mb-4">
                            <label for="price" class="form-label" style="color: var(--accent-color);">
                                <i class="fas fa-tag me-2"></i>Prezzo
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: #333333; color: var(--secondary-color); border-color: rgba(255,255,255,0.1);">€</span>
                                <input type="number"
                                       id="price"
                                       name="price"
                                       value="{{ $plate->price }}"
                                       class="form-control custom-input"
                                       step="0.01"
                                       min="0">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="img" class="form-label" style="color: var(--accent-color);">
                                <i class="fas fa-image me-2"></i>Immagine del piatto
                            </label>
                            @if($plate->img && str_starts_with($plate->img, 'plates/'))
                                <div class="mb-3 p-2" style="background-color: rgba(255,255,255,0.05); border-radius: 8px;">
                                    <p class="text-light mb-2">Immagine attuale:</p>
                                    <img src="{{ asset('storage/' . $plate->img) }}"
                                         alt="{{ $plate->plate_name }}"
                                         class="img-thumbnail"
                                         style="max-width: 200px; background-color: #333333; border-color: rgba(255,255,255,0.1);">
                                </div>
                            @endif
                            <input type="file"
                                   id="img"
                                   name="img"
                                   class="form-control custom-input"
                                   accept="image/*">
                        </div>
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save me-2"></i>Salva Modifiche
                            </button>
                            <a href="{{ route('admin.restaurants.show', $restaurant->id) }}"
                               class="btn btn-outline-danger">
                                <i class="fas fa-times me-2"></i>Annulla
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        .custom-input {
            background-color: #333333;
            border: 1px solid rgba(255,255,255,0.1);
            color: white;
        }
        .custom-input:focus {
            background-color: #404040;
            border-color: var(--accent-color);
            color: white;
            box-shadow: none;
        }
        .custom-input::placeholder {
            color: rgba(255,255,255,0.5);
        }
        .btn-warning {
            background-color: var(--accent-color);
            border: none;
            color: var(--primary-color);
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-warning:hover {
            background-color: #ffc107;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .btn-outline-danger {
            transition: all 0.3s ease;
        }
        .btn-outline-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .card {
            border: 1px solid rgba(255,255,255,0.1);
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        }
        </style>
@endsection

