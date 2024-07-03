<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studios = Studio::all();
        return view('studios.index', compact('studios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('studios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'seat_count' => 'required|integer',
        ]);

        Studio::create([
            'name' => $request->name,
            'seat_count' => $request->seat_count,
        ]);

        return redirect()->route('admin/studios')
            ->with('success', 'Studio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $studio = Studio::findOrFail($id);
        return view('studios.show', compact('studio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $studio = Studio::findOrFail($id);
        return view('studios.edit', compact('studio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $studio = Studio::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'seat_count' => 'required|integer',
        ]);

        $studio->update($request->all());

        return redirect()->route('admin/studios')
            ->with('success', 'Studio updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Studio::findOrFail($id);

        $product->delete();

        return redirect()->route('admin/studios')->with('success', 'product deleted successfully');
    }
}
