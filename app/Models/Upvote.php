<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// Example model for Upvote
class Upvote extends Model
{    
    protected $table = 'upvotes';
    protected $fillable = ['user_id', 'review_id'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function review(){
        return $this->belongsTo(Review::class);
    }

}