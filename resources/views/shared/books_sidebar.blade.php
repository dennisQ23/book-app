<div class="col-sm-3">
    <h3>Genres</h3>

    <div class="list-group">
    @foreach ($genres as $genre)
        <a href="{{ route('genres.show', $genre->id) }}" class="list-group-item">{{$genre->name}} </a>
    @endforeach
    </div>
</div>