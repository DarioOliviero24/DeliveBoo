@extends('layouts.guest')

@section('main-content')
    <div style="background-color: #f0f8ff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h1 class="text-center" style="color: #007bff; font-size: 2.5rem;">
            DeliveBoo
        </h1>
        <h2 style="color: #6c757d; font-size: 2rem;">
            @foreach ($restaurants as $restaurant)
                <div style="background-color: #ffffff; margin: 10px 0; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <p style="color: #28a745; font-size: 1.5rem;">{{ $restaurant->name }}</p>
                    <a href="{{ route('home.show', $restaurant->id) }}" class="btn btn-primary" style="background-color: #007bff; border-color: #007bff;">Show</a>
                </div>
            @endforeach
        </h2>
    </div>
@endsection


