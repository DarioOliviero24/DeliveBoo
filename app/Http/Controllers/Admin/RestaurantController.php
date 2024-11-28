<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Plates;
class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::where('user_id', auth()->id())->get();
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newRestaurant = new Restaurant();
        $newRestaurant->update($data);
        $newRestaurant->save();
        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $restaurant = Restaurant::find($id);
        $plates = Plates::where('restaurants_id', $id)->get();
        return view('admin.restaurants.show', compact('restaurant', 'plates'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ingredients = [
            'Sugar',
            'Flour',
            'Salt',
            'Butter',
            'Milk',
            'Eggs',
            'Cheese',
            'Tomatoes',
            'Basil',
            'Garlic',
            'Onion',
            'Pepper',
            'Chocolate',
            'Vanilla',
            'Cream'
        ];
        $plate = Plates::find($id);
        $existingIngredients = explode(',', $plate->ingredients);
        $restaurant = Restaurant::find($id);
        return view('admin.restaurants.edit', compact('plate', 'restaurant', 'ingredients', 'existingIngredients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plate = Plates::findOrFail($id);
        $data = $request->all();
        $plate->update($data);
        $data['ingredients'] = implode(',', $data['ingredients']);
        $plate->update($data);
        return redirect()->route('admin.restaurants.show', $plate->restaurants_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return view('admin.restaurants.destroy');
    }
}
