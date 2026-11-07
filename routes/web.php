<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::resource('books', BookController::class);

// Compatibility route used by the existing details Blade page.
Route::get('/books-catalog', function () {
    return redirect()->route('books.index');
})->name('books.catalog');
