
@extends('layouts.app')

@section('title', $book->title)

@section('content')

<div class="max-w-3xl mx-auto py-8">

    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">

        <div class="bg-blue-700 text-white px-8 py-6">
            <h2 class="text-2xl font-bold">📚 Book Details</h2>
            <p class="text-blue-100 mt-1">Book Information</p>
        </div>

        <div class="p-8">

            <h1 class="text-3xl font-bold text-gray-900 mb-2">
                {{ $book->title }}
            </h1>

            <p class="text-lg text-gray-600 mb-6">
                by {{ $book->author }}
            </p>

            <div class="border-t border-gray-200 pt-6 grid grid-cols-1 sm:grid-cols-2 gap-5">

                <div class="bg-gray-100 p-5 rounded-xl">
                    <p class="text-sm font-semibold text-gray-500">Book Code</p>
                    <p class="text-xl font-bold text-gray-900 mt-1">
                        {{ $book->id }}
                    </p>
                </div>

                <div class="bg-gray-100 p-5 rounded-xl">
                    <p class="text-sm font-semibold text-gray-500">Genre</p>
                    <p class="text-xl font-bold text-blue-700 mt-1">
                        {{ $book->genre }}
                    </p>
                </div>

                <div class="bg-gray-100 p-5 rounded-xl">
                    <p class="text-sm font-semibold text-gray-500">Price</p>
                    <p class="text-2xl font-bold text-green-700 mt-1">
                        ${{ number_format($book->price, 2) }}
                    </p>
                </div>

                <div class="bg-gray-100 p-5 rounded-xl">
                    <p class="text-sm font-semibold text-gray-500">Publication Year</p>
                    <p class="text-xl font-bold text-gray-900 mt-1">
                        {{ $book->year }}
                    </p>
                </div>

            </div>

            @if($book->description)
                <div class="mt-7">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">
                        About this Book
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        {{ $book->description }}
                    </p>
                </div>
            @endif

            <div class="mt-8 pt-5 border-t border-gray-200">
                <a href="{{ route('books.index') }}"
                   class="inline-block bg-blue-700 hover:bg-blue-800 text-white font-semibold px-6 py-3 rounded-lg transition">
                    ← Back to Catalog
                </a>
            </div>

        </div>
    </div>
</div>

@endsection
