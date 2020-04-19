<hr>

<h2>Delete this genre</h2>

{!! Form::open([
    'route' => ['genres.destroy', $genre->id],
    'method' => 'delete',
    'class' => 'delete-object'
]) !!}

<button type="submit" class="btn btn-danger">DELETE this genre</button>

{!! Form::close() !!}