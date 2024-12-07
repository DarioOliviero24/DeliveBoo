@extends('layouts.guest')

@section('main-content')
    <div class="register-container" style="height: 100vh; overflow-y: auto; scrollbar-width: none; -ms-overflow-style: none;">
        <style>
            .register-container::-webkit-scrollbar {
                display: none;
            }
        </style>
        @if ($errors->any())
            <div class="alert alert-danger py-2">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="py-3" style="color:red;">
            <strong>Dati Personali</strong>
        </h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="text-center py-2">
                <label for="name">
                    <h5>
                        Nome <span class="text-danger">*</span>
                    </h5>
                </label>
                <input class="form-control me-2 @error('name') is-invalid @enderror"
                       placeholder="Inserisci il nome..."
                       type="text"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       required
                       oninvalid="this.setCustomValidity('Per favore compila questo campo')"
                       oninput="this.setCustomValidity('')"
                       title="Per favore compila questo campo obbligatorio">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mt-2 text-center py-1">
                <label for="email">
                    <h5>
                        Email <span class="text-danger">*</span>
                    </h5>
                </label>
                <input class="form-control me-2 @error('email') is-invalid @enderror"
                       placeholder="Inserisci l'email..."
                       type="email"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       oninvalid="this.setCustomValidity('Per favore inserisci una email valida')"
                       oninput="this.setCustomValidity('')"
                       title="Per favore compila questo campo obbligatorio">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-2 text-center py-1">
                <label for="password">
                    <h5>
                        Password <span class="text-danger">*</span>
                    </h5>
                </label>
                <input class="form-control me-2 @error('password') is-invalid @enderror"
                       placeholder="Inserisci la password..."
                       type="password"
                       id="password"
                       name="password"
                       required
                       minlength="8"
                       oninvalid="this.setCustomValidity('Per favore inserisci una password')"
                       oninput="this.setCustomValidity('')"
                       title="Per favore compila questo campo obbligatorio">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mt-2 text-center py-1">
                <label for="password_confirmation">
                    <h5>
                       Riinserisci Password <span class="text-danger">*</span>
                    </h5>
                </label>
                <input class="form-control me-2"
                       placeholder="Inserisci nuovamente la password..."
                       type="password"
                       id="password_confirmation"
                       name="password_confirmation"
                       required
                       oninvalid="this.setCustomValidity('Per favore conferma la password')"
                       oninput="this.setCustomValidity('')"
                       title="Per favore compila questo campo obbligatorio">
            </div>

            <h1 class="py-3" style="color:red;">
                <strong>Dati Ristorante</strong>
            </h1>

            <!-- name del ristorante -->
            <div class="mt-2 text-center py-1">
                <label for="restaurant_name">
                    <h5>
                        Nome del ristorante <span class="text-danger">*</span>
                    </h5>
                </label>
                <input class="form-control me-2 @error('restaurant_name') is-invalid @enderror"
                       placeholder="Inserisci il nome del ristorante..."
                       type="text"
                       name="restaurant_name"
                       id="restaurant_name"
                       value="{{ old('restaurant_name') }}"
                       required
                       oninvalid="this.setCustomValidity('Per favore inserisci il nome del ristorante')"
                       oninput="this.setCustomValidity('')"
                       title="Per favore compila questo campo obbligatorio">
                @error('restaurant_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- tipologia -->
            <div class="mt-2 text-center py-1">
                <label>
                    <h5>Tipologia <span class="text-danger">*</span></h5>
                </label>
                <div class="container">
                    <div class="row justify-content-center">
                        @foreach($categories as $category)
                            <div class="">
                                <div class="form-check" style="display: flex; align-items: center;">
                                    <input class="form-check-input @error('tipologia') is-invalid @enderror"
                                           type="checkbox"
                                           name="tipologia[]"
                                           id="tipologia_{{ $loop->index }}"
                                           value="{{ $category->id }}"
                                           {{ in_array($category->id, old('tipologia', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tipologia_{{ $loop->index }}">
                                        {{ $category->tipologia }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @error('tipologia')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- address -->
            <div class="mt-2 text-center py-1">
                <label for="address">
                    <h5>
                        Indirizzo <span class="text-danger">*</span>
                    </h5>
                </label>
                <input class="form-control me-2 @error('address') is-invalid @enderror"
                       placeholder="Inserisci l'indirizzo..."
                       type="text"
                       name="address"
                       id="address"
                       value="{{ old('address') }}"
                       required
                       oninvalid="this.setCustomValidity('Per favore inserisci l\'indirizzo')"
                       oninput="this.setCustomValidity('')"
                       title="Per favore compila questo campo obbligatorio">
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- PIVA -->
            <div class="mt-2 text-center py-1">
                <label for="piva">
                    <h5>
                        P.IVA <span class="text-danger">*</span>
                    </h5>
                </label>
                <input class="form-control me-2 @error('P_Iva') is-invalid @enderror"
                       placeholder="Inserisci la P.IVA (11 numeri)..."
                       type="text"
                       id="piva"
                       name="P_Iva"
                       value="{{ old('P_Iva') }}"
                       required
                       pattern="\d{11}"
                       oninvalid="this.setCustomValidity('Per favore inserisci la P.IVA di 11 numeri')"
                       oninput="this.setCustomValidity('')"
                       title="La P.IVA deve contenere esattamente 11 numeri"
                       title="Per favore compila questo campo obbligatorio"
                       maxlength="11">
                @error('P_Iva')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <h1 class="py-3" style="color:red;">
                <strong>Primo Piatto</strong>
            </h1>

            <!-- plate_name -->
            <div class="mt-2 text-center py-1">
                <label for="plate_name">
                    <h5>
                        Nome del piatto <span class="text-danger">*</span>
                    </h5>
                </label>
                <input class="form-control me-2 @error('plate_name') is-invalid @enderror"
                       placeholder="Inserisci almeno il nome del piatto..."
                       type="text"
                       name="plate_name"
                       id="plate_name"
                       value="{{ old('plate_name') }}"
                       required
                       oninvalid="this.setCustomValidity('Per favore inserisci almeno il nome del piatto')"
                       oninput="this.setCustomValidity('')"
                       title="Per favore compila questo campo obbligatorio">
                @error('plate_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- ingredients -->
            <div class="mt-2 text-center py-1">
                <label for="ingredients">
                    <h5>
                        Ingredienti <span class="text-danger">*</span>
                    </h5>
                </label>
                <input class="form-control me-2 @error('ingredients') is-invalid @enderror"
                       placeholder="Inserisci gli ingredienti..."
                       type="text"
                       name="ingredients"
                       id="ingredients"
                       value="{{ old('ingredients') }}"
                       required
                       oninvalid="this.setCustomValidity('Per favore inserisci gli ingredienti')"
                       oninput="this.setCustomValidity('')"
                       title="Per favore compila questo campo obbligatorio">
                @error('ingredients')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- price -->
            <div class="mt-2 text-center py-1">
                <label for="price">
                    <h5>
                        Prezzo <span class="text-danger">*</span>
                    </h5>
                </label>
                <input class="form-control me-2 @error('price') is-invalid @enderror"
                       placeholder="Inserisci il prezzo..."
                       type="number"
                       name="price"
                       id="price"
                       value="{{ old('price') }}"
                       required
                       min="0"
                       step="0.01"
                       oninvalid="this.setCustomValidity('Per favore inserisci il prezzo')"
                       oninput="this.setCustomValidity('')"
                       title="Per favore compila questo campo obbligatorio">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center py-3">
                <button class="btn btn-primary" type="submit">
                    Registrati
                </button>
                <div class="mt-1">
                    <a href="{{ route('login') }}">
                        {{ __('Hai già un account?') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
