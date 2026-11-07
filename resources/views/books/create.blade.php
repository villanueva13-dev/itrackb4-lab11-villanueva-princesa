
@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Add New Book</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        {{-- Title --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border p-2 rounded @error('title') border-red-500 @enderror">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Author --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-1">Author</label>
            <input type="text" name="author" value="{{ old('author') }}" class="w-full border p-2 rounded @error('author') border-red-500 @enderror">
            @error('author')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Genre Dropdown --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-1">Genre</label>
            <select name="genre_id" class="w-full border p-2 rounded @error('genre_id') border-red-500 @enderror">
                <option value="">Select Genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" @selected(old('genre_id') == $genre->id)>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
            @error('genre_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Price --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-1">Price ($)</label>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="w-full border p-2 rounded @error('price') border-red-500 @enderror">
            @error('price')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Publication Year --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-1">Publication Year</label>
            <input type="number" name="year" value="{{ old('year') }}" class="w-full border p-2 rounded @error('year') border-red-500 @enderror">
            @error('year')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Save Book
        </button>
    </form>
</div>
@endsection
