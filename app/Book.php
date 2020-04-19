<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'books_genres');
    }
}
