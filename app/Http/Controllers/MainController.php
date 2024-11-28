<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Plates;

class MainController extends Controller
{

    public function index()
    {
        $restaurants = Restaurant::all();
        return view('welcome', compact('restaurants'));
    }

    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        $plates = Plates::where('restaurants_id', $id)->get();
        return view('welcomeShow', compact('restaurant', 'plates'));
    }

}
