@extends('layouts.guest')

@section('main-content')
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
