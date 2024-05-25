<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $fillable = ['title', 'desc', 'language_id'];
    protected $primaryKey = 'book_id';
    public $timestamps = false;

    public function people(){
        return $this->belongsToMany(Person::class, 'books_people', 'book_id', 'person_id');
    }

    public function genres(){
        return $this->belongsToMany(Genre::class, 'books_genres', 'book_id', 'genre_id');
    }

    public function reviews(){
        return $this->hasMany(Review::class, 'book_id');
    }

    public function languages(){
        return $this->belongsTo(Language::class, 'language_id');
    }
}
