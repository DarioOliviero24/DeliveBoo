@extends('layouts.guest')

@section('main-content')
    <div class="text-center" style="background-color: #F5FFFA; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h1 style="color: black; font-size: 2.5rem;" class="py-3">
            {{ $restaurant->name }}
        </h1>
        <div style="margin-top: 20px;">
            @foreach ($plates as $plate)
                <div style="background-color: #ffffff; margin: 10px 0; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h3 style="color: black; font-size: 2.5rem;">{{ $plate->plate_name }}</h3>
                    <p style="color: #6c757d;">Ingredients: {{ $plate->ingredients }}</p>
                    <p style="color: #dc3545;">Price: $ <strong>{{ number_format($plate->price, 2) }}</strong></p>
                </div>
            @endforeach
            <a href="{{ route('home') }}" class="btn btn-outline-danger" style="margin: 20px 0;">
                Back
            </a>
        </div>
    </div>
@endsection
