<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['title' => 'The Hobbit', 'author' => 'J.R.R. Tolkien', 'genre' => 'Fantasy', 'price' => 15.99, 'year' => 1937, 'is_available' => true, 'description' => 'A fantasy adventure about Bilbo Baggins.'],
            ['title' => '1984', 'author' => 'George Orwell', 'genre' => 'Dystopian', 'price' => 12.50, 'year' => 1949, 'is_available' => true, 'description' => 'A novel about surveillance and totalitarianism.'],
            ['title' => 'Pride and Prejudice', 'author' => 'Jane Austen', 'genre' => 'Fiction', 'price' => 10.99, 'year' => 1813, 'is_available' => true, 'description' => 'A classic novel of manners and relationships.'],
            ['title' => 'The Martian', 'author' => 'Andy Weir', 'genre' => 'Sci-Fi', 'price' => 14.25, 'year' => 2011, 'is_available' => false, 'description' => 'An astronaut works to survive on Mars.'],
            ['title' => 'The Silent Patient', 'author' => 'Alex Michaelides', 'genre' => 'Mystery', 'price' => 13.75, 'year' => 2019, 'is_available' => true, 'description' => null],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
