@extends('layouts.guest')

@section('main-content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4">Il tuo carrello</h2>

            @if(session()->has('cart') && count(session('cart')) > 0)
                <div class="card mb-4">
                    <div class="card-body">
                        @php $totale = 0; @endphp
                        @foreach(session('cart') as $item)
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    @if(isset($item['img']))
                                        <img src="{{ $item['img'] }}"
                                             alt="{{ $item['name'] }}"
                                             class="me-3 rounded"
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center"
                                             style="width: 60px; height: 60px;">
                                            <i class="fas fa-utensils text-secondary"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h5 class="mb-0">{{ $item['name'] }}</h5>
                                        <small class="text-muted">{{ $item['restaurant_name'] }}</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="mx-3">€{{ number_format($item['price'], 2) }}</span>
                                    <form action="{{ route('cart.remove') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="plate_id" value="{{ $item['id'] }}">
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @php $totale += $item['price']; @endphp
                        @endforeach

                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Totale:</h4>
                            <h4>€{{ number_format($totale, 2) }}</h4>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4">Dati per la consegna</h4>
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome e Cognome</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Telefono</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Indirizzo di consegna</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    id="address" name="address" required>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="notes" class="form-label">Note per la consegna (opzionale)</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-check me-2"></i>Conferma Ordine
                                </button>
                            </div>
                        </form>

                        <form action="{{ route('cart.clear') }}" method="POST" class="mt-3" onsubmit="return confirm('Sei sicuro di voler svuotare il carrello?');">
                            @csrf
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-trash me-2"></i>Svuota carrello
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Il tuo carrello è vuoto
                </div>
            @endif

            <div class="mt-4">
                <a href="{{ route('home') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Torna alla home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection