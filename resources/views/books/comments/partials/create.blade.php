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

{!! Form::open(['route' => ['books.comments.store', $book->id]]) !!}
    @include('books.comments.partials.comment_form')

    <button type="submit" class="btn btn-success">Add your comment</button>

{!! Form::close() !!}