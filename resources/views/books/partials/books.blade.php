<div class="list-group">
@foreach ($books as $book)
    <a href="{{ url('books', [$book->id]) }}" class="list-group-item">
        <h2 class="list-group font-weight-bold">{{ $book->title }}</h2>
        <p class="list-group-item-text">
            Started on: {{ $book->created_at }}
        </p>
    </a>    
@endforeach
</div>