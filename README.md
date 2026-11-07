# ITRACKB4 Laboratory Activity 10 — Your Own Lookup Table

## Project Subject

This project uses **Books** as its subject. It demonstrates how to create and use a lookup table in Laravel Eloquent. The `books` table stores book records, while the `genres` table stores the available book genres.

## Database Design

The project uses two related tables:

**Books Table**
- `id`: Primary key.
- `title`: Book title.
- `author`: Book author.
- `genre_id`: Foreign key referencing the `genres` table.
- `price`: Book price.
- `year`: Publication year.
- `is_available`: Availability status.
- `description`: Optional book description.

**Genres Table**
- `id`: Primary key.
- `name`: Genre name.
- `created_at` and `updated_at`: Timestamps.

The `genre` text column was replaced with `genre_id`, which connects each book to a record in the `genres` lookup table.

## Part G: Questions & Answers

### G1. Which column did you convert into a lookup table, and why?

I converted the `genre` column into a separate `genres` lookup table. I did this because book genres come from a fixed list of categories. Using a lookup table avoids repeating genre names and makes the records easier to manage and maintain.

### G2. What number did Screenshot 6 show, and why exactly?

Screenshot 6 showed **6 database queries**. One query retrieved the five books, while five additional queries retrieved the genre of each book separately. This is called the N+1 Query Problem. After using eager loading with `with('genre')`, Screenshot 7 showed only 2 queries.

### G3. What breaks if the `belongsTo` method is plural?

The relationship method should be named `genre()` because each book belongs to one genre. If it is named `genres()`, code that uses `genre` or `with('genre')` will not find the relationship and may produce an undefined relationship error. The relationship name must be consistent throughout the application.
