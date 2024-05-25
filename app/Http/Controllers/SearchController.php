<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Person;


class SearchController extends Controller
{
    //
    
    public function search(Request $request){
        $query = $request->input('query');
        $category = $request->input('category');

        if ($category === 'books'){
            $results = Book::where('title', 'like', "%$query%")->get();
        }
        elseif ($category === 'people') {
            $full_name = explode(" ", $query);
            $name = $full_name[0];
            $surname = $full_name[1];
            $results = Person::where('person_name', 'like', "%$name%")->
            where('person_surname', 'like', "%$surname%")->get();
        }
        else {
            $results = [];
        }

        return view("search.list", ["results" => $results, "category" => $category]);
    }

}
