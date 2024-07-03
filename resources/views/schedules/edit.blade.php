@extends('layouts.app')

@section('title', 'Edit Jadwal')

@section('contents')
<h1 class="font-bold text-2xl ml-3">Edit Jadwal</h1>
<hr />
<div class="border-b border-gray-900/10 pb-12">
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <form action="{{ route('admin/schedules/update', $schedule->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="sm:col-span-4">
                <label for="movie_id" class="block text-sm font-medium leading-6 text-gray-900">Judul Film</label>
                <div class="mt-2">
                    <select id="movie_id" name="movie_id"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @foreach($movies as $movie)
                            <option value="{{ $movie->id }}" {{ $schedule->movie_id == $movie->id ? 'selected' : '' }}>
                                {{ $movie->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="studio_id" class="block text-sm font-medium leading-6 text-gray-900">Studio</label>
                <div class="mt-2">
                    <select id="studio_id" name="studio_id"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @foreach($studios as $studio)
                            <option value="{{ $studio->id }}" {{ $schedule->studio_id == $studio->id ? 'selected' : '' }}>
                                {{ $studio->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="showtime" class="block text-sm font-medium leading-6 text-gray-900">Waktu Tayang</label>
                <div class="mt-2">
                    <input id="showtime" name="showtime" type="datetime-local"
                        value="{{ \Carbon\Carbon::parse($schedule->showtime)->format('Y-m-d\TH:i') }}"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Harga</label>
                <div class="mt-2">
                    <input id="price" name="price" type="number" step="0.01" value="{{ $schedule->price }}"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <button type="submit"
                class="flex w-full justify-center mt-10 rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </form>
    </div>
</div>
@endsection