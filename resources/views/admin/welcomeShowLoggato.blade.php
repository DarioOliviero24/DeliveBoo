@extends('layouts.app')

@section('main-content')
    <div class="text-center" style="background-color: #F5FFFA; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h1 style="color: black; font-size: 2.5rem;" class="py-3">
           {{ $restaurant->name }}
        </h1>

        <div style="background-color: #F5FFFA; padding: 0px; border-radius: 10px; ">
            @foreach ($plates as $plate)
                <div style="margin: 10px 5px; width: 40%; height: 350px;" class="card d-inline-flex text-center">
                    <div class="card-body">
                        <h2 style="color: black;">{{ $plate->plate_name }}</h2>
                        <p style="color: #6c757d;">Ingredients: {{ $plate->ingredients }}</p>
                        <p style="color: #dc3545;">Price: $<strong>{{ number_format($plate->price, 2) }}</strong></p>
                    </div>
                </div>
            @endforeach
            <div class="py-4">
                 <a href="{{ route('welcomeLoggato.index') }}" class="btn btn-outline-danger"><strong>BACK</strong></a>
            </div>
        </div>

    </div>
@endsection
