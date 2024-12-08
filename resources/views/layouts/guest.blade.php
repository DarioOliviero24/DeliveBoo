<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UFT-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DeliveBoo</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <i class="fas fa-utensils me-2"></i>DeliveBoo
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.show') }}">
                                <i class="fas fa-shopping-cart me-1"></i>Carrello
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div style="margin-top: 76px; min-height: calc(100vh - 76px);">
            @yield('main-content')
        </div>
        <footer class="bg-dark text-light py-4 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5 class="mb-3" style="color: var(--accent-color);">DeliveBoo</h5>
                        <p class="mb-0">La tua piattaforma di consegna cibo preferita</p>
                    </div>
                    <div class="col-md-4">
                        <h5 class="mb-3" style="color: var(--accent-color);">Link Utili</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="footer-link">Chi Siamo</a></li>
                            <li><a href="#" class="footer-link">Lavora con Noi</a></li>
                            <li><a href="#" class="footer-link">Diventa Partner</a></li>
                            <li><a href="#" class="footer-link">Centro Assistenza</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5 class="mb-3" style="color: var(--accent-color);">Seguici</h5>
                        <div class="social-links">
                            <a href="#" class="footer-link"><i class="fab fa-facebook me-3"></i></a>
                            <a href="#" class="footer-link"><i class="fab fa-instagram me-3"></i></a>
                            <a href="#" class="footer-link"><i class="fab fa-twitter me-3"></i></a>
                            <a href="#" class="footer-link"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <hr class="mt-4" style="border-color: rgba(255, 255, 255, 0.1);">
                <div class="text-center mt-3">
                    <small>&copy; 2024 DeliveBoo. Tutti i diritti riservati.</small>
                </div>
            </div>
        </footer>
        <main class="py-4">
            <div class="container">
                @yield('main-content')


            </div>
        </main>
    </body>
</html>
