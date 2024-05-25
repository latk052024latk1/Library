<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'people';
    protected $fillable = ['person_name', 'person_surname'];
    protected $primaryKey = 'person_id';
    public $timestamps = false;

    public function books(){
        return $this->belongsToMany(Book::class, 'books_people', 'person_id', 'book_id');
    }
}
