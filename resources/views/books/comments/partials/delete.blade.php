{!! Form::open([
        'route' => ['books.comments.destroy', $book->id, $comment->id],
        'method' => 'delete',
        'class' => 'float-left'
    ]) 
!!}
    &nbsp;<button class="bnt btn-danger btn-xs">Delete</button>
{!! Form::close() !!}