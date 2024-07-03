@extends('layouts.app')

@section('title', 'Detail Film')

@section('contents')
<h1 class="font-bold text-2xl ml-3">Detail Film</h1>
<hr />
<div class="border-b border-gray-900/10 pb-12">
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Gambar</label>
            <div class="mt-2">
                <img src="{{ asset('images/' . $movie->image) }}" alt="{{ $movie->title }}" width="200">
            </div>
        </div>
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Judul</label>
            <div class="mt-2">
                {{ $movie->title }}
            </div>
        </div>

        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Genre</label>
            <div class="mt-2">
                {{ $movie->genre }}
            </div>
        </div>

        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Sinopsis</label>
            <div class="mt-2">
                {{ $movie->description}}
            </div>
        </div>

        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Durasi/mnt</label>
            <div class="mt-2">
                {{ $movie->duration}}
            </div>
        </div>

    </div>
</div>
@endsection