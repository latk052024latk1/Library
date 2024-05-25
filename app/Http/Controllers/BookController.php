<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Language;
use App\Models\Genre;
use App\Http\Requests\StoreBookRequest;


class BookController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('books.create', ['languages' => $languages]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        // Validate the form data

        // Create a new book instance
        $book = new Book();
        $book->title = $request->input('title');
        $book->desc = $request->input('desc');
        $book->pages = $request->input('pages');
        $book->language_id = $request->input('language_id');
        // You may need to adjust this part depending on your actual Book model

        // Save the book to the database
        $book->save();

        // Redirect back to the create form with success message
        return redirect()->route('books.create')->with('success', 'Book created successfully.');
    }

    public function show($id){
        $book = Book::with('reviews')->findOrFail($id);

        $reviews = $book->reviews->take(3);

        return view("books.show", ['book' => $book, 'reviews' => $reviews]);

    }

    public function edit($id){
        $book = Book::findOrFail($id);
        $languages = Language::all();
        $genres = Genre::all();

        return view('books.edit', ['book' => $book, 'languages' => $languages, 'genres' => $genres]);
    }

    public function update(StoreBookRequest $request, $id){
        $book = Book::findOrFail($id);

        $book->update($request->only(['title', 'description', 'pages', 'language_id']));
        
        $selectedGenres = $request->input('genres', []);

        $currentGenres = $book->genres;

        foreach ($currentGenres as $currentGenre) {
            $genreFound = false;
            foreach ($selectedGenres as $selectedGenreId) {
                if ($currentGenre->id == $selectedGenreId) {
                    $genreFound = true;
                    break;
               }
           }
            if (!$genreFound) {
                $book->genres()->detach($currentGenre->id);
           }
       }
   
       foreach ($selectedGenres as $selectedGenreId) {
           $genreExists = false;
           foreach ($currentGenres as $currentGenre) {
               if ($currentGenre->id == $selectedGenreId) {
                   $genreExists = true;
                   break;
               }
           }
           if (!$genreExists) {
               $book->genres()->attach($selectedGenreId);
           }
       }
   

        return redirect()->route('books.show', $id)->with('success', 'Books data updated successfully.');
        
    }
}
