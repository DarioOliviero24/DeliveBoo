@extends('layouts.app')

@section('main-content')
    <div style="background-color: #F5FFFA; padding: 20px; border-radius: 15px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);">
        <h1 class="text-center" style="color: black; font-size: 2.5rem;">
            //TODO: Aggiungere il nome del loger di fianco a DELIVEBOO
            WELCOME TO DELIVEBOO
        </h1>
        <div class="input-group mb-3 w-25 container">
            <select class="form-select" id="inputGroupSelect01">
              <option selected>Scegli il tipo di ristorante...</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
        </div>
        <h2 class="text-center">
            @foreach ($restaurants as $restaurant)
                <div style="margin: 10px 0; width: 40%; height: 350px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);" class="card d-inline-flex text-center">
                    <div style="background-color: white; border-radius: 15px;" class="card-body">
                        <h5 style="color: black; font-size: 2.5rem;" class="card-title ">{{ $restaurant->name }}</h5>
                        <p style="color: grey" class="card-text">{{ $restaurant->address }}</p>
                        <a href="{{ route('welcomeLoggato.show', $restaurant->id) }}" class="btn btn-outline-success">Vedi Piatti</a>
                    </div>
                </div>
            @endforeach
        </h2>
    </div>
@endsection
