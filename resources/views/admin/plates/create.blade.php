@extends('layouts.app')

@section('page-title', 'Plates')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">Aggiungi Piatto - {{ $restaurant_id->name }}</h2>
                </div>
                <div class="card-body">
                    @error('restaurant_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <form action="{{ route('admin.plates.store') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="mb-3">
                            <label for="plate_name" class="form-label"><strong>Nome del piatto</strong></label>
                            <input type="text"
                                id="plate_name"
                                name="plate_name"
                                placeholder="Inserisci il nome del piatto"
                                class="form-control @error('plate_name') is-invalid @enderror"
                                value="{{ old('plate_name') }}">
                            @error('plate_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ingredients" class="form-label"><strong>Ingredienti</strong></label>
                            <textarea
                                id="ingredients"
                                name="ingredients"
                                rows="3"
                                class="form-control @error('ingredients') is-invalid @enderror"
                                placeholder="Inserisci gli ingredienti separati da virgola">{{ old('ingredients') }}</textarea>
                            @error('ingredients')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label"><strong>Prezzo</strong></label>
                            <input type="number"
                                id="price"
                                name="price"
                                placeholder="Inserisci il prezzo"
                                class="form-control @error('price') is-invalid @enderror"
                                step="0.01"
                                min="0"
                                value="{{ old('price') }}">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="hidden" name="restaurant_id" value="{{ $restaurant_id->id }}">

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                Salva
                            </button>
                            <a href="{{ route('admin.restaurants.show', $restaurant_id->id) }}" class="btn btn-secondary">
                                Torna indietro
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
