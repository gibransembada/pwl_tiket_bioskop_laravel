<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Studio;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        $seats = Seat::with('studio')->get();
        return view('seats.index', compact('seats'));
    }

    public function create()
    {
        $studios = Studio::all();
        return view('seats.create', compact('studios'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'studio_id' => 'required|exists:studios,id',
            'seat_number' => 'required|string|max:10',
            'available' => 'boolean'
        ]);

        Seat::create($validatedData);

        return redirect()->route('admin/seats')->with('success', 'Seat created successfully.');
    }

    public function edit(string $id)
    {
        $seat = Seat::findOrFail($id);
        $studios = Studio::all();
        return view('seats.edit', compact('seat', 'studios'));
    }

    public function update(Request $request, Seat $seat)
    {
        $request->validate([
            'studio_id' => 'required|exists:studios,id',
            'seat_number' => 'required|string|max:10',
            'available' => 'boolean'
        ]);

        $seat->update($request->all());

        return redirect()->route('admin/seats')->with('success', 'Seat updated successfully.');
    }

    public function destroy(Seat $seat)
    {
        $seat->delete();
        return redirect()->route('admin/seats')->with('success', 'Seat deleted successfully.');
    }
}
