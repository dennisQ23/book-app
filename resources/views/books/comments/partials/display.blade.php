<hr>
<h2>Comments</h2>

@include('books.comments.partials.create')

<hr>

<ul class="list-group">
@foreach ($book->comments as $comment)
    <li class="list-group-item">
        <div class="text-muted">
            <small>{{ $comment->created_at->diffForHumans() }}</small>
        </div>
        <p>{{ $comment->comment }}</p>

        @if ($comment->canEdit())
            <div class="clearfix">
                <button class="edit-object btn btn-info btn-xs float-left">Edit</button>
                @include('books.comments.partials.delete')
            </div>        
            @include('books.comments.partials.edit')
        @endif
        
    </li>
@endforeach
</ul>