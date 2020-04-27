<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'search']]);
        $this->middleware('auth');
    }

    public function profile()
    {
        $user = Auth::user();
        $books = $user->books;
        $comments = $user->comments;
        return view('profile/profile', ['books' => $books, 'comments' => $comments]);
    }
}
