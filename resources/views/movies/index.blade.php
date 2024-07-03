@extends('layouts.app')

@section('title', 'Daftar Film')

@section('contents')
<div>
    <h1 class="font-bold text-2xl ml-3">Daftar Film</h1>
    <a href="{{ route('admin/movies/create') }}"
        class="text-white float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah
        Film</a>
    <hr />
    @if(Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Gambar</th>
                <th scope="col" class="px-6 py-3">Judul</th>
                <th scope="col" class="px-6 py-3">Genre</th>
                <th scope="col" class="px-6 py-3">Sinopsis</th>
                <th scope="col" class="px-6 py-3">Durasi/mnt</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($movies->count() > 0)
                @foreach($movies as $movie)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td>
                            <img src="{{ asset('images/' . $movie->image) }}" alt="{{ $movie->title }}" width="100">
                        </td>
                        <td>
                            {{ $movie->title }}
                        </td>
                        <td>
                            {{ $movie->genre }}
                        </td>
                        <td>
                            {{ $movie->description }}
                        </td>
                        <td>
                            {{ $movie->duration}}
                        </td>

                        <td class="w-36">
                            <div class="h-14 pt-5">
                                <a href="{{ route('admin/movies/show', $movie->id) }}" class="text-blue-800">Detail</a> |
                                <a href="{{ route('admin/movies/edit', $movie->id)}}" class="text-green-800 pl-2">Edit</a> |
                                <form action="{{ route('admin/movies/destroy', $movie->id) }}" method="POST"
                                    onsubmit="return confirm('Delete?')" class="float-right text-red-800">
                                    @csrf
                                    @method('DELETE')
                                    <button>Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="7">Film tidak ditemukan</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection