<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        return view('payments.create', compact('booking'));
    }

    public function store(Request $request)
    {
        Payment::create([
            'booking_id' => $request->booking_id,
            'payment_method' => $request->payment_method,
            'amount' => $request->amount,
        ]);

        $booking = Booking::findOrFail($request->booking_id);
        $booking->update(['is_paid' => true]);

        return redirect()->route('bookings.show', $request->booking_id)->with('success', 'Payment completed successfully.');
    }
}

