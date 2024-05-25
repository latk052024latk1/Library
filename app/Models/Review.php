<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = ['book_id', 'user_id', 'review_name', 'review_text', 'time_created'];
    protected $primaryKey = 'review_id';
    public $timestamps = false;


    public function books(){
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function upvotes(){
        return $this->hasMany(Upvote::class, 'review_id');
    }

    public function isUpvotedBy(User $user){
        return $this->upvotes()->where('user_id', $user->id)->exists();
    }

}
