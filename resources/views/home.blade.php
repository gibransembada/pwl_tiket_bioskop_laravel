@extends('layouts.user')

@section('title', 'Daftar Film')

@section('contents')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">
            Daftar Film
        </h1>
    </div>
</header>
<hr />
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($movies as $movie)
                <div class="border-4 border-dashed border-gray-200 rounded-lg p-4">
                    <img src="{{ asset('images/' . $movie->image) }}" alt="{{ $movie->title }}"
                        class="w-full h-64 object-cover rounded-lg">
                    <h2 class="text-xl font-bold mt-4">{{ $movie->title }}</h2>
                    <a href="{{ route('movies.show', $movie->id) }}"
                        class="inline-block mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Lihat Detail
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</main>
@endsection