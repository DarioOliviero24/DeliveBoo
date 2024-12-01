@extends('layouts.guest')

@section('main-content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1 class="py-5" style="color:red;">
        <strong>
            Dati Personali
        </strong>
    </h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="text-center py-2">
            <label for="name">
                <h3>
                    Nome
                </h3>
            </label>
            <input class="form-control me-2" placeholder="Inserisci il nome..." type="text" id="name" name="name">
        </div>

        <!-- Email Address -->
        <div class="mt-4 text-center py-2">
            <label for="email">
                <h3>
                    Email
                </h3>
            </label>
            <input class="form-control me-2" placeholder="Inserisci l'email..." type="email" id="email" name="email">
        </div>

        <!-- Password -->
        <div class="mt-4 text-center py-2">
            <label for="password">
                <h3>
                    Password
                </h3>
            </label>
            <input class="form-control me-2" placeholder="Inserisci la password..." type="password" id="password" name="password">
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 text-center py-2">
            <label for="password_confirmation">
                <h3>
                   Riinserisci Password
                </h3>
            </label>
            <input class="form-control me-2" placeholder="Inserisci nuovamente la password..." type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <!-- creare un ristorante -->
        <!-- name del ristorante -->
        <div class="mt-4 text-center py-2">
            <label for="restaurant_name">
                <h3>
                    Nome del ristorante
                </h3>
            </label>
            <input class="form-control me-2" placeholder="Inserisci il nome del ristorante..." type="text" name="restaurant_name" id="restaurant_name">
        </div>

        <!-- tipologia -->
        <div class="mt-4 text-center py-2">
            <label for="tipologia">
                <h3>
                    Tipologia
                </h3>
            </label>
            <br>
            <select name="tipologia" id="tipologia">
                @foreach ($categoriesList as $category)
                    <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>

        <!-- address -->
        <div class="mt-4 text-center py-2">
            <label for="address">
                <h3>
                    Indirizzo
                </h3>
            </label>
            <input class="form-control me-2" placeholder="Inserisci l'indirizzo..." type="text" name="address" id="address">
        </div>
     <!-- PIVA -->
        <div class="mt-4 text-center py-2">
            <label for="piva">
                <h3>
                PIVA
                </h3>
            </label>
            <input class="form-control me-2" placeholder="Inserisci la PIVA..." type="text" id="piva" name="P_Iva">
        </div>

        <h1 class="py-5" style="color:red;">
            <strong>Aggiungere Menu</strong>
        </h1>
        <!-- creare almeno un piatto -->

        <!-- plate_name -->
        <div class="mt-4 text-center py-2">
            <label for="plate_name">
                <h3>
                    Nome del piatto
                </h3>
            </label>
            <input class="form-control me-2" placeholder="Inserisci il nome del piatto..." type="text" name="plate_name" id="plate_name">
        </div>
        <!-- ingredients -->
        <div class="mt-4 text-center py-2">
            <label for="ingredients">
                <h3>
                    Ingredienti
                </h3>
            </label>
            <input class="form-control me-2" placeholder="Inserisci gli ingredienti..." type="text" name="ingredients" id="ingredients">
        </div>
        <!-- price -->
        <div class="mt-4 text-center py-2">
            <label for="price">
                <h3>
                    Prezzo
                </h3>
            </label>
            <input class="form-control me-2" placeholder="Inserisci il prezzo..." type="text" name="price" id="price">
        </div>

        <div class="text-center py-5">
            <button class="btn btn-primary" type="submit">
                Register
            </button>
            <div>
                <a href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>



        </div>
    </form>
@endsection
