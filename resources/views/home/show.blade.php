@extends('layouts.user')

@section('title', 'Detail Film')

@section('contents')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">
            Detail Film
        </h1>
    </div>
</header>
<hr />
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row">
            <img src="{{ asset('images/' . $movie->image) }}" alt="{{ $movie->title }}"
                class="w-full lg:w-1/2 object-cover rounded-lg shadow-lg">
            <div class="lg:ml-6">
                <h2 class="text-2xl font-bold">{{ $movie->title }}</h2>
                <p class="text-gray-700">{{ $movie->genre }}</p>
                <p class="mt-4">{{ $movie->description }}</p>
                <a href="#belitiket"
                    class="mt-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Beli Tiket
                </a>
            </div>
        </div>
        <div id="schedules" class="mt-10">
            <h3 class="text-xl font-bold">Jadwal Tayang</h3>
            <table class="min-w-full bg-white mt-4">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Studio</th>
                        <th class="py-2 px-4 border-b">Waktu Tayang</th>
                        <th class="py-2 px-4 border-b">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $schedule)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $schedule->studio->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $schedule->showtime }}</td>
                            <td class="py-2 px-4 border-b">{{ $schedule->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection