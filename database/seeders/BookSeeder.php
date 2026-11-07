<?php

namespace Database\Seeders;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // Create genres first
        $fantasy = Genre::create(['name' => 'Fantasy']);
        $dystopian = Genre::create(['name' => 'Dystopian']);
        $fiction = Genre::create(['name' => 'Fiction']);
        $sciFi = Genre::create(['name' => 'Sci-Fi']);
        $mystery = Genre::create(['name' => 'Mystery']);

        // Create books using their genre IDs
        Book::create([
            'title' => 'The Hobbit',
            'author' => 'J.R.R. Tolkien',
            'genre_id' => $fantasy->id,
            'price' => 15.99,
            'year' => 1937,
            'is_available' => true,
            'description' => 'A fantasy adventure about Bilbo Baggins.',
        ]);

        Book::create([
            'title' => '1984',
            'author' => 'George Orwell',
            'genre_id' => $dystopian->id,
            'price' => 12.50,
            'year' => 1949,
            'is_available' => true,
            'description' => 'A novel about surveillance and totalitarianism.',
        ]);

        Book::create([
            'title' => 'Pride and Prejudice',
            'author' => 'Jane Austen',
            'genre_id' => $fiction->id,
            'price' => 10.99,
            'year' => 1813,
            'is_available' => true,
            'description' => 'A classic novel of manners and relationships.',
        ]);

        Book::create([
            'title' => 'The Martian',
            'author' => 'Andy Weir',
            'genre_id' => $sciFi->id,
            'price' => 14.25,
            'year' => 2011,
            'is_available' => false,
            'description' => 'An astronaut works to survive on Mars.',
        ]);

        Book::create([
            'title' => 'The Silent Patient',
            'author' => 'Alex Michaelides',
            'genre_id' => $mystery->id,
            'price' => 13.75,
            'year' => 2019,
            'is_available' => true,
            'description' => null,
        ]);
    }
}
