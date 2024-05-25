<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UpvoteController;
use App\Http\Controllers\SearchController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function(){
#    Route::resource('people', PersonController::class)->only('people.show', 'people.index');
#    Route::get('people/{person}', [PersonController::class, 'show'])->name('people.show');

   ############ Route::get('people/create', [PersonController::class, 'create'])->name('people.create');
    
    // Route for showing a specific person (accessible by authenticated users)
    Route::get('books/{book}', [BookController::class, 'show'])->where('book', '[0-9]+')->name('books.show');
    Route::get('books/{book}/reviews', [ReviewController::class, 'list'])->where(
        'book', '[0-9]+')->name('reviews.list');

    Route::get('books/{book}/reviews/create', [ReviewController::class, 'create'])->where(
        'book', '[0-9]+')->name('reviews.create');

    Route::post('books/{book}/reviews', [ReviewController::class, 'store'])->where(
        'book', '[0-9]+')->name('reviews.store');
    
    Route::post('books/{book}/reviews/{review}/upvote', [UpvoteController::class, 'addUpvote'])
    ->where('book', '[0-9]+')->where('review', '[0-9]+')->name('upvotes.addUpvote');

    Route::delete('books/{book}/reviews/{review}/upvote', [UpvoteController::class, 'deleteUpvote'])
    ->where('book', '[0-9]+')->where('review', '[0-9]+')->name('upvotes.deleteUpvote');

    Route::get('people/{person}', [PersonController::class, 'show'])->where('person', '[0-9]+')->name('people.show');

    Route::get('search/', [SearchController::class, 'search'])->name('search');
    
    
    #Route::get('genres/{genre}', [GenreController::class, 'show'])->where('genre', '[0-9]+')->name('genre.show');
    #Route::get('languages/{language}', [LanguageController::class, 'show'])->where('language', '[0-9]+')->name('languages.show');

});

Route::prefix('admin/')->middleware(['auth','admin'])->group(function(){

    
    Route::get('books', [BookController::class, 'index'])->name('books.index');
    Route::get('books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('books', [BookController::class, 'store'])->name('books.store');
    Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');
    
    Route::get('people', [PersonController::class, 'index'])->name('people.index');
    Route::get('people/create', [PersonController::class, 'create'])->name('people.create');
    Route::post('people', [PersonController::class, 'store'])->name('people.store');
    Route::get('people/{person}/edit', [PersonController::class, 'edit'])->name('people.edit');
    Route::put('people/{person}', [PersonController::class, 'update'])->name('people.update');
    #Route::delete('people/{person}', [PersonController::class, 'destroy'])->name('people.destroy');
    

    Route::get('genres', [GenreController::class, 'index'])->name('genres.index');
    Route::get('genres/create', [GenreController::class, 'create'])->name('genres.create');
    Route::post('genres', [GenreController::class, 'store'])->name('genres.store');
    Route::get('genres/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit');
    Route::put('genres/{genre}', [GenreController::class, 'update'])->name('genres.update');


    Route::get('languages', [LanguageController::class, 'index'])->name('languages.index');
    Route::get('languages/create', [LanguageController::class, 'create'])->name('languages.create');
    Route::post('languages', [LanguageController::class, 'store'])->name('languages.store');
    Route::get('languages/{language}/edit', [LanguageController::class, 'edit'])->name('languages.edit');
    Route::put('languages/{language}', [LanguageController::class, 'update'])->name('languages.update');


    #Route::resource('people', PersonController::class)->except(['people.show']);
 #   Route::resource('genres', GenreController::class);
  #  Route::resource('languages', LanguageController::class);
});

require __DIR__.'/auth.php';
