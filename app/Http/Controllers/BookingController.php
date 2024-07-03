<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingSeat;
use App\Models\Schedule;
use App\Models\Seat;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'schedule', 'seats'])->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $schedules = Schedule::all();
        $seats = Seat::all();
        return view('bookings.create', compact('schedules', 'seats'));
    }

    public function store(Request $request)
    {
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'schedule_id' => $request->schedule_id,
            'total_price' => $request->total_price,
            'is_paid' => false,
        ]);

        foreach ($request->seats as $seat_id) {
            BookingSeat::create([
                'booking_id' => $booking->id,
                'seat_id' => $seat_id,
            ]);
        }

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    public function show($id)
    {
        $booking = Booking::with(['user', 'schedule', 'seats', 'payment'])->findOrFail($id);
        return view('bookings.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $schedules = Schedule::all();
        $seats = Seat::all();
        return view('bookings.edit', compact('booking', 'schedules', 'seats'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update([
            'schedule_id' => $request->schedule_id,
            'total_price' => $request->total_price,
            'is_paid' => $request->is_paid,
        ]);

        BookingSeat::where('booking_id', $id)->delete();
        foreach ($request->seats as $seat_id) {
            BookingSeat::create([
                'booking_id' => $id,
                'seat_id' => $seat_id,
            ]);
        }

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        Booking::findOrFail($id)->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
}

