@extends('layouts.guest')

@section('main-content')
    <div style="background-color: #F5FFFA; padding: 20px; border-radius: 15px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);">
        <h1 class="text-center" style="color: black; font-size: 2.5rem; margin: 10px 0;">
            DeliveBoo
        </h1>
        <div class="input-group mb-3 w-25 container">
            <select class="form-select" id="inputGroupSelect01">
              <option selected>Scegli il tipo di ristorante...</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
        </div>
        <h2 style="color: #6c757d; font-size: 2rem;">
            @foreach ($restaurants as $restaurant)
                <div style="background-color: #ffffff; margin: 10px 0; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <p style="color: black; font-size: 2.5rem;">{{ $restaurant->name }}</p>
                    <a href="{{ route('home.show', $restaurant->id) }}" class="btn btn-outline-success">Vedi Piatti</a>
                </div>


            @endforeach
        </h2>
    </div>
@endsection


