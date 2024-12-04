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
        dd($restaurants);
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
        $restaurant = Restaurant::with(['categories', 'plates'])->findOrFail($id);
        return view('welcomeShow', compact('restaurant'));
    }
}
