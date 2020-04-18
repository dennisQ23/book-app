{!! Form::model($comment, ['route' => ['books.comments.update', $book->id, $comment->id], 'method' => 'put', 'class' => 'd-none edit-object-form']) !!}
    @include('books.comments.partials.comment_form')

    <button type="submit" class="btn btn-info">Update the comment</button>
{!! Form::close() !!}