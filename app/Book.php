<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Book extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'books_genres');
    }

    public function canEdit()
    {
        if (!FacadesAuth::check()) {
            return false;
        }

        if (FacadesAuth::user()->id === $this->user_id) {
            return true;
        }

        // by default, can edit
        return false;
    }
}
