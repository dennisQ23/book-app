<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Comment extends Model
{
    public function book()
    {
        return $this->belongsTo('App\Book');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
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
