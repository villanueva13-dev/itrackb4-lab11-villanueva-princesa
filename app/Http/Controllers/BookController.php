<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;


class BookController extends Controller
{
    public function index(Request $request)
{
    $query = Book::with('genre');

    $genreId = $request->query('genre_id');

    if ($genreId) {
        $query->where('genre_id', $genreId);
    }

    $genres = Genre::all();

    $books = $query->get();

    return view('books.catalog', compact('books', 'genres', 'genreId'));
}
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:255',
            'author' => 'required|min:3|max:255',
            'genre_id' => 'required|exists:genres,id',
            'price' => 'required|numeric|min:0.99',
            'year' => 'required|integer|min:1800|max:2026',
        ]);

        Book::create($validated + ['is_available' => true]);

        return redirect()->route('books.index')
            ->with('success', 'Book added successfully!');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('books.details', compact('book'));
    }
}