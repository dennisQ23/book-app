<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookCommentController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'search']]);
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $bookId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $bookId)
    {
        $request->validate([

            'comment' => 'required',
        ]);

        $comment = new Comment;

        $comment->book_id = $bookId;
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        // success
        return redirect()
            ->action('BookController@show', $bookId)
            ->with(
                'success',
                'Comment Added'
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $bookId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bookId, $id)
    {
        $request->validate([

            'comment' => 'required',
        ]);

        $comment = Comment::findOrFail($id);

        if (!$comment->canEdit()) {
            abort('403', 'Not authorized');
        }

        $comment->comment = $request->comment;
        $comment->save();

        return redirect()
            ->action('BookController@show', $bookId)
            ->with('success', 'Comment Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $bookId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bookId, $id)
    {
        $comment = Comment::findOrFail($id);

        if (!$comment->canEdit()) {
            abort('403', 'Not authorized');
        }

        $comment->delete();

        return redirect()
            ->action('BookController@show', $bookId)
            ->with('succes', 'Comment Deleted');
    }
}
