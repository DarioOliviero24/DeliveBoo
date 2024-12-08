<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page-title') | {{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite('resources/js/app.js')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body style="background-color: var(--primary-color);">
        <header>
            <nav class="navbar navbar-expand-lg fixed-top" style="background-color: rgba(26, 26, 26, 0.95); backdrop-filter: blur(10px);">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center" href="{{ route('welcomeLoggato.index') }}">
                        <i class="fas fa-utensils me-2" style="color: var(--accent-color); font-size: 1.5rem;"></i>
                        <span style="color: var(--accent-color); font-weight: bold;">DeliveBoo</span>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                            style="border-color: rgba(255,255,255,0.1);">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                    <button type="button" class="btn btn-warning nav-btn">
                                        <i class="fas fa-chart-line me-2"></i>Dashboard
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.restaurants.index') }}">
                                    <button type="button" class="btn btn-warning nav-btn">
                                        <i class="fas fa-store me-2"></i>I Miei Ristoranti
                                    </button>
                                </a>
                            </li>
                        </ul>

                        <div class="d-flex align-items-center">
                            <div class="me-4">
                                <a href="#" class="text-decoration-none">
                                    <span class="badge rounded-pill" style="background-color: var(--secondary-color);">
                                        <i class="fas fa-star me-1"></i>Pro
                                    </span>
                                </a>
                            </div>

                            <div class="me-4">
                                <a href="#" class="text-decoration-none">
                                    <span class="text-light">
                                        <i class="fas fa-bell me-1" style="color: var(--accent-color);"></i>
                                        <span class="badge rounded-pill bg-danger">2</span>
                                    </span>
                                </a>
                            </div>

                            <div class="dropdown me-4">
                                <a href="#" class="text-decoration-none dropdown-toggle text-light" data-bs-toggle="dropdown">
                                    <i class="fas fa-user-circle me-1" style="color: var(--accent-color);"></i>
                                    Il Mio Profilo
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Impostazioni</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-heart me-2"></i>Preferiti</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                                            @csrf
                                            <button type="submit" class="btn btn-link text-danger p-0">
                                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <main style="margin-top: 100px; min-height: calc(100vh - 180px); display: flex; align-items: center;">
            @yield('main-content')
        </main>

        <footer class="py-4 mt-5" style="background-color: #1a1a1a;">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-4">
                        <h5 style="color: var(--accent-color);">DeliveBoo Business</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-light text-decoration-none footer-link">Diventa Partner</a></li>
                            <li><a href="#" class="text-light text-decoration-none footer-link">Soluzioni Business</a></li>
                            <li><a href="#" class="text-light text-decoration-none footer-link">Pubblicità con noi</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5 style="color: var(--accent-color);">Risorse Utili</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-light text-decoration-none footer-link">Centro Assistenza</a></li>
                            <li><a href="#" class="text-light text-decoration-none footer-link">FAQ</a></li>
                            <li><a href="#" class="text-light text-decoration-none footer-link">Blog</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5 style="color: var(--accent-color);">Note Legali</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-light text-decoration-none footer-link">Privacy Policy</a></li>
                            <li><a href="#" class="text-light text-decoration-none footer-link">Termini e Condizioni</a></li>
                            <li><a href="#" class="text-light text-decoration-none footer-link">Cookie Policy</a></li>
                        </ul>
                    </div>
                </div>
                <hr style="border-color: rgba(255,255,255,0.1);" class="my-4">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="mb-0 text-light opacity-75">&copy; 2024 DeliveBoo. Tutti i diritti riservati.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <a href="#" class="text-light me-3"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </footer>

        <style>
        .nav-btn {
            background-color: var(--accent-color);
            border: none;
            color: var(--primary-color);
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .nav-btn:hover {
            background-color: #ffc107;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .dropdown-menu {
            background-color: #2a2a2a;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .dropdown-item {
            color: #fff;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: #333333;
            color: var(--accent-color);
        }

        .footer-link {
            transition: all 0.3s ease;
            opacity: 0.8;
        }

        .footer-link:hover {
            opacity: 1;
            color: var(--accent-color) !important;
            padding-left: 10px;
        }

        .social-icon {
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            color: var(--accent-color) !important;
            transform: translateY(-2px);
        }
        </style>
    </body>
</html>
