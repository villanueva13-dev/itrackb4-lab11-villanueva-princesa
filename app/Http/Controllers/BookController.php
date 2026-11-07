<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();
        $genre = $request->query('genre');

        if ($genre) {
            $query->where('genre', $genre);
        }

        $books = $query->get();

        return view('books.catalog', compact('books', 'genre'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'  => 'required|min:3|max:255',
            'author' => 'required|min:3|max:255',
            'genre'  => 'required|in:Fiction,Dystopian,Sci-Fi,Non-Fiction,Mystery',
            'price'  => 'required|numeric|min:0.99',
            'year'   => 'required|integer|min:1800|max:2026',
        ]);

        Book::create($validated + ['is_available' => true]);

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('books.details', compact('book'));
    }
}
