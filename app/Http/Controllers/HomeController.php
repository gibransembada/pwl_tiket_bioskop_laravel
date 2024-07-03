<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Schedule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('home.index', compact('movies'));
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        $schedules = Schedule::where('movie_id', $id)->get();
        return view('home.show', compact('movie', 'schedules'));
    }
}
