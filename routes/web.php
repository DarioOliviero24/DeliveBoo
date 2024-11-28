<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\WelcomeLoggatoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Welcome home per tutti
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('show/{id}', [MainController::class, 'show'])->name('home.show');

// WelcomeLoggato home per loggati
Route::resource('welcomeLoggato', WelcomeLoggatoController::class);

// Admin home per loggati
Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {

    Route::get('/dashboard', [AdminMainController::class, 'dashboard'])->name('dashboard');
    
    Route::resource('restaurants', RestaurantController::class);

});



require __DIR__.'/auth.php';
