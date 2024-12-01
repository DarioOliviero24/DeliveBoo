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
        $categorieList = [
            'tutti',
            'italiano',
            'spagnolo',
            'giapponese',
            'cinese',
            'indiano',
        ];
        $restaurants = Restaurant::with('categories')->get();
        return view('welcome', compact('restaurants', 'categorieList'));
    }
    public function filter(Request $request)
    {
        $categorieList = [
            'tutti',
            'italiano',
            'spagnolo',
            'giapponese',
            'cinese',
            'indiano',
        ];
        if($request->tipologia !== 'tutti'){
            $restaurants = Restaurant::with('categories')
                ->whereHas('categories', function($query) use ($request) {
                    $query->where('tipologia', $request->tipologia);
                })->get();
        }else{
            $restaurants = Restaurant::with('categories')->get();
        }
        $optionValue = $request->tipologia;
        return view('welcome', compact('restaurants', 'categorieList'));
    }

    public function show($id)
    {
        $restaurant = Restaurant::with('categories')->find($id);
        $plates = Plates::where('restaurants_id', $id)->get();
        return view('welcomeShow', compact('restaurant', 'plates'));
    }

}
