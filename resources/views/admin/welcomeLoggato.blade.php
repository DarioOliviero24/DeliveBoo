@extends('layouts.app')

@section('main-content')
    <div style="background-color: #87CEFA; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h1 class="text-center" style="color: black; font-size: 2.5rem;">
            DeliveBoo LOGGATO
        </h1>
        <h2 class="text-center">
            @foreach ($restaurants as $restaurant)
                <div style="margin: 10px 0; width: 40%; height: 350px;" class="card d-inline-flex text-center">
                    <div class="card-body">
                        <h5 style="color: black; font-size: 2.5rem;" class="card-title ">{{ $restaurant->name }}</h5>
                        <p style="color: grey" class="card-text">{{ $restaurant->address }}</p>
                        <a href="{{ route('welcomeLoggato.show', $restaurant->id) }}" class="btn btn-primary" style="background-color: #00BFFF; border-color: white;">Vedi Piatti</a>
                    </div>
                </div>
            @endforeach
        </h2>
    </div>
@endsection
