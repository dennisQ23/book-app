<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class BookCommentController extends Controller
{

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
            'book_id' => 'required',
            'comment' => 'required',
        ]);

        $comment = new Comment;

        $comment->book_id = $bookId;
        $comment->comment = $request->comment;

        // success
        return redirect()
            ->action('BookController@show', $bookId)
            ->with(
                'message',
                '<div class="alert alert-success">Comment Added</div>'
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
        //
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
        //
    }
}
