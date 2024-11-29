@extends('layouts.guest')

@section('main-content')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="text-center py-2">
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

        <!-- Remember Me -->
        <div class="mt-4 text-center py-2">
            <label for="remember_me" class="form-check-label">
                <input id="remember_me" type="checkbox" name="remember" class="form-check-input me-1">
                Ricordami
            </label>
        </div>

        <div class="text-center py-5">
            <button class="btn btn-primary" type="submit">
                Log in
            </button>
            <div class="mt-2">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Hai dimenticato la password?') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
@endsection