@extends('layouts.app')

@section('page-title', 'Plates')

@section('main-content')
    <h1 class="mb-4">Create Plates</h1>

    <ul class="list-group">
        <h1 class="mb-4">Modifica Piatti del ristorante {{ $restaurant_id->name }}</h1>
        @error('restaurant_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <ul class="list-group">
            <li>
                <form action="{{ route('admin.plates.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <strong>Nome del piatto:</strong> <input type="text" name="plate_name" placeholder="inserisci il nome del piatto" class="form-control"><br>
                    @foreach ($ingredients as $ingredient)
                            <input type="checkbox" name="ingredients[]" value="{{ $ingredient }}"> {{ $ingredient }}<br>
                    @endforeach
                    <strong>Prezzo:</strong> <input type="number" name="price" placeholder="inserisci il prezzo del piatto" class="form-control" step="0.01" min="0">
                    <input type="hidden" name="restaurant_id" value="{{ $restaurant_id->id }}">
                    <button type="submit" class="btn btn-primary btn-sm">Salva</button>
                </form>
                indietro
    </ul>


@endsection