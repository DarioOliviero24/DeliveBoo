@extends('layouts.guest')

@section('main-content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4" style="color: var(--accent-color);">
                <i class="fas fa-shopping-cart me-2"></i>Il tuo carrello
            </h2>

            @if(session()->has('cart') && count(session('cart')) > 0)
                <div class="card shadow-lg border-0" style="background: linear-gradient(145deg, #2a2a2a, #333333);">
                    <div class="card-body p-4">
                        @php $totale = 0; @endphp
                        @foreach(session('cart') as $item)
                            <div class="d-flex justify-content-between align-items-center mb-4 p-3 hover-card"
                                 style="background-color: rgba(255,255,255,0.05); border-radius: 8px;">
                                <div class="d-flex align-items-center">
                                    @if(isset($item['img']))
                                        <img src="{{ $item['img'] }}"
                                             alt="{{ $item['name'] }}"
                                             class="me-3 rounded"
                                             style="width: 80px; height: 80px; object-fit: cover;">
                                    @else
                                        <div class="me-3 rounded d-flex align-items-center justify-content-center"
                                             style="width: 80px; height: 80px; background: linear-gradient(145deg, #1a1a1a, #2a2a2a);">
                                            <i class="fas fa-utensils fa-2x" style="color: var(--accent-color);"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h5 class="mb-1" style="color: var(--accent-color);">{{ $item['name'] }}</h5>
                                        <small class="text-light opacity-75">{{ $item['restaurant_name'] }}</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="quantity-controls d-flex align-items-center me-3">
                                        <form action="{{ route('cart.update-quantity') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="plate_id" value="{{ $item['id'] }}">
                                            <input type="hidden" name="action" value="decrease">
                                            <button type="submit" class="btn btn-sm btn-outline-warning" {{ ($item['quantity'] ?? 1) <= 1 ? 'disabled' : '' }}>
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </form>

                                        <span class="mx-3 text-light">{{ $item['quantity'] ?? 1 }}</span>

                                        <form action="{{ route('cart.update-quantity') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="plate_id" value="{{ $item['id'] }}">
                                            <input type="hidden" name="action" value="increase">
                                            <button type="submit" class="btn btn-sm btn-outline-warning">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <span class="mx-3" style="color: var(--accent-color); font-weight: bold;">
                                        €{{ number_format($item['price'] * ($item['quantity'] ?? 1), 2) }}
                                    </span>
                                    <form action="{{ route('cart.remove') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="plate_id" value="{{ $item['id'] }}">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @php $totale += $item['price'] * ($item['quantity'] ?? 1); @endphp
                        @endforeach

                        <form action="{{ route('cart.clear') }}" method="POST" class="mb-4"
                              onsubmit="return confirm('Sei sicuro di voler svuotare il carrello?');">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fas fa-trash me-2"></i>Svuota carrello
                            </button>
                        </form>

                        <hr style="border-color: rgba(255,255,255,0.1);">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="text-light mb-0">Totale:</h4>
                            <h4 style="color: var(--accent-color);">€{{ number_format($totale, 2) }}</h4>
                        </div>

                        <div class="card" style="background-color: rgba(255,255,255,0.05);">
                            <div class="card-body">
                                <h4 class="mb-4" style="color: var(--accent-color);">
                                    <i class="fas fa-shipping-fast me-2"></i>Dati per la consegna
                                </h4>
                                <form action="{{ route('orders.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label text-light">Nome e Cognome</label>
                                        <input type="text" class="form-control custom-input @error('name') is-invalid @enderror"
                                            name="name" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-light">Email</label>
                                        <input type="email" class="form-control custom-input @error('email') is-invalid @enderror"
                                            name="email" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-light">Telefono</label>
                                        <input type="tel" class="form-control custom-input @error('phone') is-invalid @enderror"
                                            name="phone" required>
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-light">Indirizzo di consegna</label>
                                        <input type="text" class="form-control custom-input @error('address') is-invalid @enderror"
                                            name="address" required>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label text-light">Note per la consegna (opzionale)</label>
                                        <textarea class="form-control custom-input" name="notes" rows="3"></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-warning w-100">
                                        <i class="fas fa-check me-2"></i>Conferma Ordine
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert" style="background: rgba(255,215,0,0.1); border-color: var(--accent-color); color: var(--accent-color);">
                    <i class="fas fa-info-circle me-2"></i>
                    Il tuo carrello è vuoto
                </div>
            @endif

            <div class="mt-4">
                <a href="{{ route('home') }}" class="btn btn-outline-warning">
                    <i class="fas fa-arrow-left me-2"></i>Torna alla home
                </a>
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

.custom-input::placeholder {
    color: rgba(255,255,255,0.5);
}

.btn-warning {
    background-color: var(--accent-color);
    border: none;
    color: var(--primary-color);
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-warning:hover {
    background-color: #ffc107;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.btn-outline-warning {
    color: var(--accent-color);
    border-color: var(--accent-color);
    transition: all 0.3s ease;
}

.btn-outline-warning:hover {
    background-color: var(--accent-color);
    color: var(--primary-color);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.hover-card {
    transition: all 0.3s ease;
}

.hover-card:hover {
    transform: translateX(5px);
    background-color: rgba(255,255,255,0.1) !important;
}

.invalid-feedback {
    color: var(--secondary-color);
}
</style>
@endsection
