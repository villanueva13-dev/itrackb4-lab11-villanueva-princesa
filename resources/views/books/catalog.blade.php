@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">

    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Book Shelves</h1>
            <p class="text-gray-600 text-sm mt-1">Browse and manage available books</p>
        </div>

        <a href="{{ route('books.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg shadow-md">
            Add New Book
        </a>
    </div>

    <div class="mb-6 bg-white p-4 rounded-lg shadow-sm">
        <span class="font-semibold text-gray-700 mr-2">Filter by Genre:</span>

        <a href="{{ route('books.index') }}"
           class="inline-block px-3 py-1 rounded text-sm {{ !$genreId ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }} mr-2">
            All
        </a>

        @foreach ($genres as $genre)
            <a href="{{ route('books.index', ['genre_id' => $genre->id]) }}"
               class="inline-block px-3 py-1 rounded text-sm {{ $genreId == $genre->id ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }} mr-2">
                {{ $genre->name }}
            </a>
        @endforeach
    </div>

    @if ($books->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($books as $book)
                <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-5 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-2">
                            <h2 class="text-xl font-bold text-gray-900 leading-snug">
                                {{ $book->title }}
                            </h2>

                            <span class="text-xs font-semibold px-2.5 py-0.5 rounded bg-blue-100 text-blue-800">
                                {{ $book->genre->name }}
                            </span>
                        </div>

                        <p class="text-gray-600 text-sm mb-1">
                            <span class="font-medium text-gray-700">Author:</span>
                            {{ $book->author }}
                        </p>

                        <p class="text-gray-600 text-sm mb-1">
                            <span class="font-medium text-gray-700">Year:</span>
                            {{ $book->year }}
                        </p>

                        <p class="text-gray-800 font-bold text-lg mt-2">
                            ${{ number_format($book->price, 2) }}
                        </p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-gray-100">
                        <a href="{{ route('books.show', $book->id) }}"
                           class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
                            View Details →
                        </a>

                        <form action="{{ route('books.destroy', $book) }}" method="POST"
      onsubmit="return confirm('Are you sure you want to delete this book?')">
    @csrf
    @method('DELETE')

    <button type="submit" class="text-red-600 hover:underline">
        Delete
    </button>
</form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white p-8 rounded-lg shadow-sm text-center text-gray-500">
            No books found in this catalog view.
        </div>
    @endif

</div>

@endsection