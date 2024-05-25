<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upvote;

class UpvoteController extends Controller
{
    //
    
    public function addUpvote(Request $request, $book, $review)
    {
        $user = auth()->user();
        $upvote = Upvote::where('user_id', $user->id)
                    ->where('review_id', $review)
                    ->first();
        if (!$upvote) {
            Upvote::create([
                'user_id' => $user->id,
                'review_id' => $review,
            ]);
        }
        return redirect()->route("reviews.list", $book);
}

// Controller method to handle deleting an upvote
    public function deleteUpvote(Request $request, $book, $review)
    {
        $user = auth()->user();
        Upvote::where('user_id', $user->id)
                ->where('review_id', $review)
                ->delete();
        return redirect()->route("reviews.list", $book);
        
}


}
