@extends('layouts.guest')

@section('main-content')
    <div style="background-color: #F5FFFA; padding: 20px; border-radius: 15px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);">
        <h1 class="text-center" style="color: black; font-size: 2.5rem;">
            DELIVEBOO
        </h1>
        <h2 style="color: #6c757d; font-size: 2rem;">
            @foreach ($restaurants as $restaurant)
                <div style="background-color: #ffffff; margin: 10px 0; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h5 style="color: black; font-size: 2.5rem;" class="card-title ">{{ $restaurant->name }}</h5>
                    <p style="color: grey" class="card-text">{{ $restaurant->address }}</p>
                    <a href="{{ route('welcomeLoggato.show', $restaurant->id) }}" class="btn btn-outline-success">Vedi Piatti</a>
                </div>

            @endforeach
        </h2>
    </div>
@endsection


