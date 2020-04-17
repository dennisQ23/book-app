@extends('layouts.master')

@section('title', 'Books')

@section('content')
    <div class="mt-5">
        <a href="{{ action('BookController@create') }}" class="btn btn-info float-right">Add book</a>
        <h1>Books Index</h1>
    </div>

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
@endsection


