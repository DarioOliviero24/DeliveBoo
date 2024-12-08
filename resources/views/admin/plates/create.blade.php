@extends('layouts.app')

@section('page-title', 'Nuovo Piatto')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0" style="background: linear-gradient(145deg, #2a2a2a, #333333);">
                <div class="card-header py-3" style="background: linear-gradient(145deg, var(--secondary-color), #ff6b6b);">
                    <h2 class="h3 mb-0 text-white">
                        <i class="fas fa-plus-circle me-2"></i>
                        Nuovo Piatto - <span style="color: var(--accent-color);">{{ $restaurant_id->name }}</span>
                    </h2>
                </div>
                <div class="card-body p-4">
                    @error('restaurant_id')
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            {{ $message }}
                        </div>
                    @enderror

                    <form action="{{ route('admin.plates.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="mb-4">
                            <label for="plate_name" class="form-label" style="color: var(--accent-color);">
                                <i class="fas fa-utensils me-2"></i>Nome del piatto
                            </label>
                            <input type="text"
                                id="plate_name"
                                name="plate_name"
                                placeholder="Inserisci il nome del piatto"
                                class="form-control custom-input @error('plate_name') is-invalid @enderror"
                                value="{{ old('plate_name') }}">
                            @error('plate_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="img" class="form-label" style="color: var(--accent-color);">
                                <i class="fas fa-image me-2"></i>Immagine del piatto
                            </label>
                            <input type="file"
                                id="img"
                                name="img"
                                class="form-control custom-input @error('img') is-invalid @enderror"
                                accept="image/*">
                            @error('img')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="ingredients" class="form-label" style="color: var(--accent-color);">
                                <i class="fas fa-list me-2"></i>Ingredienti
                            </label>
                            <textarea
                                id="ingredients"
                                name="ingredients"
                                rows="3"
                                class="form-control custom-input @error('ingredients') is-invalid @enderror"
                                placeholder="Inserisci gli ingredienti separati da virgola">{{ old('ingredients') }}</textarea>
                            @error('ingredients')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                                    placeholder="Inserisci il prezzo"
                                    class="form-control custom-input @error('price') is-invalid @enderror"
                                    step="0.01"
                                    min="0"
                                    value="{{ old('price') }}">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="restaurant_id" value="{{ $restaurant_id->id }}">

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save me-2"></i>Salva Piatto
                            </button>
                            <a href="{{ route('admin.restaurants.show', $restaurant_id->id) }}"
                                class="btn btn-outline-danger">
                                 <i class="fas fa-times me-2"></i>Annulla
                            </a>
                        </div>
                    </form>
                </div>
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
    .invalid-feedback {
        color: var(--secondary-color);
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
</style>
@endsection
