<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Book;
use App\Http\Requests\StoreReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function list($book_id)
    {
        //
        $book = Book::findOrFail($book_id);
        $reviews = $book->reviews;

        return view('reviews.list', ['book'=> $book, 'reviews' => $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $book_id)
    {
        //
        $book = Book::findOrFail($book_id);
        return view('reviews.create', ['book' => $book]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {
        //
        $newReview = Review::create([
            'book_id' => $request->input('book_id'),
            'user_id' => auth()->user()->id,
            'review_name' => $request->input('name'),
            'review_text' => $request->input('text'),
            'time_created' => now()
        ]);

        redirect()->route('books.show', ['book' => $request->input('book_id')]);

    }

    /**
     * Display the specified resource.
     */
    public function show(int $review_id)
    {
        //
        $review = Review::findOrFail($review_id);
        $book = $review->books;

        return view('reviews.show', ['book'=> $book, 'review' => $review]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
