<h1>Add a Comment</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['route' => ['books.comments.store', $book->id]) !!}
    <div class="form-group">
        {!! Form::label('comment', 'Comment') !!}
        {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
    </div>

    <button type="submit" class="btn btn-success">Add your comment</button>

{!! Form::close() !!}