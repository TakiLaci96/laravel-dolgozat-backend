<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use Illuminate\Http\Request;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dogs = Dog::all();
        return $dogs;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dog = Dog::create($request->all());
        return $dog;
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dog = Dog::find($id);
        if (is_null($dog)) {
            return response()->json(["message" => "Nem található kutya az alábbi azonosítóval: $id"]);
        }
        return $dog;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dog = Dog::find($id);
        if (is_null($dog)) {
            return response()->json(["message" => "Nem található kutya az alábbi azonosítóval: $id"]);
        }
        $dog->fill($request->all());
        $dog->save();
        return $dog;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dog = Dog::find($id);
        if (is_null($dog)) {
            return response()->json(["message" => "Nem található kutya az alábbi azonosítóval: $id"]);
        }
        $dog->delete();
        return response()->noContent();
    }
}
