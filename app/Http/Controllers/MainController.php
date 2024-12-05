<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Plates;
use App\Models\Categories;

class MainController extends Controller
{
    public function index()
    {
        $categorieList = Categories::pluck('tipologia')->unique()->toArray();
        array_unshift($categorieList, 'tutti');

        $restaurants = Restaurant::with('categories')->get();
        return view('welcome', compact('restaurants', 'categorieList'));
    }

    public function filter(Request $request)
    {
        $categorieList = Categories::pluck('tipologia')->unique()->toArray();
        array_unshift($categorieList, 'tutti');

        if ($request->tipologia !== 'tutti') {
            $restaurants = Restaurant::whereHas('categories', function($query) use ($request) {
                $query->where('tipologia', $request->tipologia);
            })->with('categories')->get();
        } else {
            $restaurants = Restaurant::with('categories')->get();
        }

        $selectedCategory = $request->tipologia;
        return view('welcome', compact('restaurants', 'categorieList', 'selectedCategory'));
    }

    public function show($id)
    {
        $restaurant = Restaurant::with(['categories'])->findOrFail($id);
        $plates = Plates::where('restaurants_id', $id)->get();
        return view('welcomeShow', compact('restaurant', 'plates'));
    }

    public function addToCart(Request $request)
    {
        $plate = Plates::findOrFail($request->plate_id);
        $restaurant = Restaurant::findOrFail($request->restaurant_id);

        $cart = session()->get('cart', []);

        $cart[] = [
            'id' => $plate->id,
            'name' => $plate->plate_name,
            'price' => $plate->price,
            'restaurant_name' => $restaurant->name,
            'restaurant_id' => $restaurant->id
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Prodotto aggiunto al carrello!');
    }

    public function showCart()
    {
        return view('carrelloGuest');
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $cart = array_filter($cart, function($item) use ($request) {
            return $item['id'] != $request->plate_id;
        });

        session()->put('cart', array_values($cart));

        return redirect()->back()->with('success', 'Prodotto rimosso dal carrello!');
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Carrello svuotato!');
    }

    public function storeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        if (!session()->has('cart') || count(session('cart')) == 0) {
            return redirect()->back()->with('error', 'Il carrello è vuoto');
        }

        try {
            // Qui andrebbe la logica per salvare l'ordine nel database
            // Per ora facciamo solo un reset del carrello e mostriamo un messaggio di successo

            session()->forget('cart');
            return redirect()->route('home')->with('success', 'Ordine confermato con successo! Riceverai una email di conferma.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Si è verificato un errore durante il processo di ordine.');
        }
    }
}
