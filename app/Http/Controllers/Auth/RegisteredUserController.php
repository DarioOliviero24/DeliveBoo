<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Restaurant;
use App\Models\Plates;
use App\Models\Categories;
use App\Models\CategoryRestaurant;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $categories = Categories::all();

        return view('auth.register', compact('categories'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'restaurant_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'P_Iva' => ['required', 'string', 'size:11', 'regex:/^[0-9]+$/'],
            'plate_name' => ['required', 'string', 'max:255'],
            'tipologia' => ['required', 'array'],
            'ingredients' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0.01'],
        ], [
            'required' => 'Il campo :attribute è obbligatorio',
            'email' => 'Inserisci un indirizzo email valido',
            'max' => 'Il campo :attribute non può superare :max caratteri',
            'unique' => 'Questa email è già stata registrata',
            'confirmed' => 'Le password non coincidono',
            'size' => 'La P.IVA deve essere di 11 numeri',
            'regex' => 'La P.IVA deve contenere solo numeri',
            'numeric' => 'Il prezzo deve essere un numero',
            'min' => 'Il prezzo deve essere maggiore di zero',
        ]);

        return DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            $restaurant = Restaurant::create([
                'name' => $request->restaurant_name,
                'address' => $request->address,
                'P_Iva' => $request->P_Iva,
                'user_id' => $user->id,
            ]);

            for ($i = 0; $i < count($request->tipologia); $i++) {
                CategoryRestaurant::create([
                    'category_id' => $i+1,
                    'restaurant_id' => $restaurant->id,
                ]);
            }

            Plates::create([
                'plate_name' => $request->plate_name,
                'ingredients' => $request->ingredients,
                'price' => $request->price,
                'restaurants_id' => $restaurant->id,
            ]);

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        });
    }
}