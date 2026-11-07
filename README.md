# ITRACKB4 Laboratory Activity 9 — Books

## Project subject
This project uses **Books** as its subject. The `books` table stores the book records displayed by the existing catalog and detail pages.

## Database design
- `title`, `author`, and `genre`: text information about each book.
- `price`: the book's price.
- `year`: integer publication year.
- `is_available`: boolean availability status.
- `description`: the only nullable column because a book record can still be useful even when no description is provided.

## Part F: Questions & Answers

### F1. Which column did you make nullable, and why that one and not another?
I made the `description` column nullable because some books may not have an available description. The title, author, genre, price, publication year, and availability status are needed for the catalog, so they are not nullable.

### F2. Which step failed first for you, and what did the error say?
**Complete this answer after performing the required Tinker test and capturing Screenshot 3.** Write the exact error message shown in your terminal. Do not guess or copy an error that you did not receive.

### F3. You changed no Blade file in Part D, yet your pages still work. Why not?
The Blade pages still work because the controller continues to pass variables named `$books` and `$book` to the same view files. Eloquent model records provide attribute access using the same field names, so the existing Blade expressions can display the database values without changing the templates.
