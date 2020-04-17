<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
    }
}
