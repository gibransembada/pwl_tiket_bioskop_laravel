@extends('layouts.app')

@section('title', 'Daftar Booking')

@section('contents')
<h1 class="font-bold text-2xl ml-3">Daftar Booking</h1>
<hr />
<div class="mt-4">
    <a href="{{ route('bookings.create') }}"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Tambah Booking
    </a>
</div>
@if (session('success'))
    <div class="mt-4 p-4 bg-green-500 text-white">
        {{ session('success') }}
    </div>
@endif
<table class="min-w-full mt-4 bg-white">
    <thead>
        <tr>
            <th class="py-2 px-4 border-b">User</th>
            <th class="py-2 px-4 border-b">Film</th>
            <th class="py-2 px-4 border-b">Total Harga</th>
            <th class="py-2 px-4 border-b">Status Pembayaran</th>
            <th class="py-2 px-4 border-b">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td class="py-2 px-4 border-b">{{ $booking->user->name }}</td>
                <td class="py-2 px-4 border-b">{{ $booking->schedule->movie->title }}</td>
                <td class="py-2 px-4 border-b">{{ $booking->total_price }}</td>
                <td class="py-2 px-4 border-b">
                    @if($booking->is_paid)
                        <span class="bg-green-500 text-white px-2 py-1 rounded">Sudah Dibayar</span>
                    @else
                        <span class="bg-red-500 text-white px-2 py-1 rounded">Belum Dibayar</span>
                    @endif
                </td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('bookings.show', $booking->id) }}" class="text-blue-500 hover:underline">Detail</a>
                    <a href="{{ route('bookings.edit', $booking->id) }}"
                        class="text-yellow-500 hover:underline ml-2">Edit</a>
                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="inline-block ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection