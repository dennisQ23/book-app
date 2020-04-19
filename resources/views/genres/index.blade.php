@extends('layouts.master')

@section('title', 'Book Genres')

@section('content')
    <div class="mt-5">
        <a href="{{ route('genres.create') }}" class="btn btn-info float-right">Add genre</a>
        <h1>Genre Index</h1>
    </div>

    <div class="list-group">
    @foreach ($genres as $genre)
        <div class="list-group-item">
            <h2 class="list-group font-weight-bold">{{ $genre->name }}</h2>
            <p class="list-group-item-text">
                <a href="{{ route('genres.edit', [$genre->id]) }}">Edit</a> 
            </p>
        </div>
    @endforeach
    </div>
@endsection


