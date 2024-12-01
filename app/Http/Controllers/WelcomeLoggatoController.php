<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Plates;
use Illuminate\Http\Request;

class WelcomeLoggatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        return view('admin.welcomeLoggato', compact('restaurants', 'categorieList'));
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
        return view('admin.welcomeLoggato', compact('restaurants', 'categorieList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        $plates = Plates::where('restaurants_id', $id)->get();
        return view('admin.welcomeShowLoggato', compact('restaurant', 'plates'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
