<hr>

<h2>Delete this book</h2>

{!! Form::open([
    'action' => ['BookController@destroy', $book->id],
    'method' => 'delete',
    'class' => 'delete-object'
]) !!}

<button type="submit" class="btn btn-danger">DELETE this book</button>

{!! Form::close() !!}