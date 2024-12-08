@extends('layouts.guest')

@section('main-content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0" style="background-color: #2a2a2a;">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4" style="color: var(--accent-color);">Accedi</h2>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label text-light">Email</label>
                            <input class="form-control custom-input"
                                   placeholder="La tua email..."
                                   type="email"
                                   id="email"
                                   name="email"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label text-light">Password</label>
                            <input class="form-control custom-input"
                                   placeholder="La tua password..."
                                   type="password"
                                   id="password"
                                   name="password"
                                   required>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
                                <label for="remember_me" class="form-check-label text-light">
                                    Ricordami
                                </label>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-warning" type="submit">
                                Accedi
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-center mt-3">
                                <a href="{{ route('password.request') }}" class="text-light text-decoration-none">
                                    Password dimenticata?
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.custom-input {
    background-color: #333333;
    border: 1px solid rgba(255,255,255,0.1);
    color: white;
}

.custom-input:focus {
    background-color: #404040;
    border-color: var(--accent-color);
    color: white;
    box-shadow: none;
}

.form-check-input:checked {
    background-color: var(--accent-color);
    border-color: var(--accent-color);
}
</style>
@endsection
