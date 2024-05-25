<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Http\Requests\StorePersonRequest;

class PersonController extends Controller
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
        return view('people.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request)
    {
        //
        $person = new Person();

        $person->person_name = $request->input('name');
        $person->person_surname = $request->input('surname');
        $person->birth_date = $request->input('birth');
        $person->death_date = $request->input('death');

        $person->save();

        return redirect()->route('people.index')->with('success', 'Record created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(int $person)
    {
        //
        $person = Person::findOrFail($person);
        $books = $person->books;
        return view('people.show', ['person' => $person, 'books' => $books]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $person)
    {
        //
        $person = Person::findOrFail($person);

        return view('people.edit', ['person' => $person]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePersonRequest $request, int $person)
    {
        //
        
        $person = Person::findOrFail($person);

        $person->person_name = $request->input('name');
        $person->person_surname = $request->input('surname');
        $person->birth_date = $request->input('birth');
        $person->death_date = $request->input('death');
        
        $person->save();

        return redirect()->route('people.index')->with('success', 'Data edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $person_id)
    {
        //
    }
}
