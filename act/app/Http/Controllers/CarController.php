<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $cars = Car::all();
        return view('index', compact('cars'));

    }

   
    public function create()
    {
        return view('create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'year' => 'required|integer',
        ]);

        Car::create($request->all());
        return redirect()->route('cars.index')->with('success', 'Car added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('edit', compact('car'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'year' => 'required|integer',
        ]);

        $car->update($request->all());
        return redirect()->route('cars.index')->with('success', 'Car updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully');
    }
}
