@extends('layouts.guest')

@section('main-content')
    <div class="text-center" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h1 style="color: #007bff; font-size: 2.5rem;">
            Show {{ $restaurant->name }}
        </h1>
        <h2 style="color: #6c757d; font-size: 2rem;">
            {{ $restaurant->name }}
        </h2>
        <div style="margin-top: 20px;">
            @foreach ($plates as $plate)
                <div style="background-color: #ffffff; margin: 10px 0; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h3 style="color: #28a745;">{{ $plate->plate_name }}</h3>
                    <p style="color: #6c757d;">Ingredients: {{ $plate->ingredients }}</p>
                    <p style="color: #dc3545;">Price: ${{ number_format($plate->price, 2) }}</p>
                </div>
            @endforeach
            <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection