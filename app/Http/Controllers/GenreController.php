<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Http\Requests\StoreGenreRequest;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('genres.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request)
    {
        //
        $genre = new Genre();
        $genre->genre_name = $request->input('genre_name');
        $genre->genre_desc = $request->input('genre_desc');

        $genre->save();

        return redirect()->route('genres.create')->with('success', 'Genre created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $genre)
    {
        //
        $genre = Genre::findOrFail($genre);
        return view('genres.show', ['genre' => $genre]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
        $genre = Genre::findOrFail($id);
        
        return view('genres.edit', ['genre' => $genre]);        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreGenreRequest $request, int $id)
    {
        //
        $genre = Genre::findOrFail($id);
        $genre->genre_name = $request->input('name');
        $genre->genre_desc = $request->input('desc');
        
        $genre->save();

        return redirect()->route('genres.show', $id)->with('success', 'Genre data was edited successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}
