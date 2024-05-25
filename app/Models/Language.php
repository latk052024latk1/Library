<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languages';
    protected $fillable = ['language_name'];
    protected $primaryKey = 'language_id';
    public $timestamps = false;

    public function books(){
        return $this->hasMany(Book::class, "language_id");
    }
}
