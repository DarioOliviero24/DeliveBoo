@extends('layouts.app')

@section('main-content')
    <div style="background-color: #F5FFFA; padding: 20px; border-radius: 15px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);">
        <h1 class="text-center" style="color: black; font-size: 2.5rem;">
            WELCOME TO DELIVEBOO
            <div style="color: red;">{{ Auth::user()->name }}</div>
        </h1>
        <div class="input-group mb-3 w-25 container">
            <form action="{{ route('admin.welcomeLoggato.filter') }}" method="GET">
                <select class="form-select" id="inputGroupSelect01" name="tipologia">
                    @foreach ($categorieList as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-outline-success">Filtra</button>
            </form>
        </div>
        <h2 class="text-center">
            @foreach ($restaurants as $restaurant)
                <div style="margin: 10px 0; width: 40%; height: 350px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);" class="card d-inline-flex text-center">
                    <div style="background-color: white; border-radius: 15px;" class="card-body">
                        <h5 style="color: black; font-size: 2.5rem;" class="card-title ">{{ $restaurant->name }}</h5>
                        <p style="color: grey" class="card-text">{{ $restaurant->address }}</p>
                        <a href="{{ route('welcomeLoggato.show', $restaurant->id) }}" class="btn btn-outline-success">Vedi Piatti</a>

                        @foreach ($restaurant->categories as $category)
                            <p  style="color: #6c757d; margin-top: 10px;">Categoria: {{ $category->tipologia }}</p>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </h2>
    </div>
@endsection
