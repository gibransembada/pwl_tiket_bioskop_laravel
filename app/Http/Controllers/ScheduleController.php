<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Movie;
use App\Models\Studio;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['movie', 'studio'])->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $movies = Movie::all();
        $studios = Studio::all();
        return view('schedules.create', compact('movies', 'studios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'studio_id' => 'required|exists:studios,id',
            'showtime' => 'required|date',
            'price' => 'required|numeric',
        ]);

        Schedule::create($request->all());

        return redirect()->route('admin/schedules')->with('success', 'Schedule created successfully.');
    }

    public function edit(string $id)
    {
        $movies = Movie::all();
        $studios = Studio::all();
        $schedule = Schedule::findOrFail($id);
        return view('schedules.edit', compact('schedule', 'movies', 'studios'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'studio_id' => 'required|exists:studios,id',
            'showtime' => 'required|date',
            'price' => 'required|numeric',
        ]);

        $schedule->update($request->all());

        return redirect()->route('admin/schedules')->with('success', 'Schedule updated successfully.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('admin/schedules')->with('success', 'Schedule deleted successfully.');
    }
}
