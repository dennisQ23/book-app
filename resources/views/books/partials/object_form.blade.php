<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('genre_id[]', 'Book Genre') !!}
    {!! Form::select(
            'genre_id',
            $genres,
            $book->genres->pluck('id')->all(),
            ['multiple' => true, 'class' => 'form-control']
        ) 
    !!}
</div>