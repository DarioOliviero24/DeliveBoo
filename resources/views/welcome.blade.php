@extends('layouts.guest')

@section('main-content')
    <div style="background-color: #F5FFFA; padding: 20px; border-radius: 15px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);">
        <h1 class="text-center" style="color: black; font-size: 2.5rem; margin: 10px 0;">
            DeliveBoo
        </h1>
        <div class="input-group mb-3 w-25 container">
            <form action="{{ route('home.filter') }}" method="GET">
                <select class="form-select" id="inputGroupSelect01" name="tipologia">
                @foreach ($categorieList as $category)
                        <option value="{{ $category }}" {{ request('tipologia') == $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-outline-success" >Cerca</button>
            </form>
        </div>
        <h2 style="color: #6c757d; font-size: 2rem;">
            @foreach ($restaurants as $restaurant)
                <div style="background-color: #ffffff; margin: 10px 0; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <p style="color: black; font-size: 2.5rem;">{{ $restaurant->name }}</p>
                    <a href="{{ route('home.show', $restaurant->id) }}" class="btn btn-outline-success">Vedi Piatti</a>

                    @foreach ($restaurant->categories as $category)
                        <p style="color: #6c757d;">Categoria: {{ $category->tipologia }}</p>
                    @endforeach
                </div>


            @endforeach
        </h2>
    </div>
@endsection


