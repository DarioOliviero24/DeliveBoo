<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plates;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {

        $restaurant_id = Restaurant::find($id);

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


        return view('admin.plates.create', compact('ingredients', 'restaurant_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'plate_name' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'price' => 'required|numeric|min:0',
            'restaurant_id' => 'required|exists:restaurants,id',
            'img' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['ingredients'] = $request->ingredients;
        $data['restaurants_id'] = $request->restaurant_id;

        // Gestione dell'immagine
        if ($request->hasFile('img')) {
            $img_path = $request->file('img')->store('plates', 'public');
            $data['img'] = $img_path;
        }

        $newPlate = new Plates($data);
        $newPlate->save();

        return redirect()->route('admin.restaurants.show', $newPlate->restaurants_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Plates $plates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plates $plates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plates $plate)
    {
        $request->validate([
            'plate_name' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'price' => 'required|numeric|min:0',
            'img' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        // Gestione dell'immagine
        if ($request->hasFile('img')) {
            // Elimina la vecchia immagine se esiste ed è nel nostro storage
            if ($plate->img && str_starts_with($plate->img, 'plates/')) {
                Storage::disk('public')->delete($plate->img);
            }

            $img_path = $request->file('img')->store('plates', 'public');
            $data['img'] = $img_path;
        }

        $plate->update($data);

        return redirect()->route('admin.restaurants.show', $plate->restaurants_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $plates = Plates::find($request->plate_id);

        // Elimina l'immagine se esiste ed è nel nostro storage
        if ($plates->img && str_starts_with($plates->img, 'plates/')) {
            Storage::disk('public')->delete($plates->img);
        }

        $plates->delete();
        return redirect()->route('admin.restaurants.show', $plates->restaurants_id);
    }
}