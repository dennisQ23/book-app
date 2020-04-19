@extends('layouts.master')

@section('title', $genre->name . ' Book')

@section('content')
<div class="row">
    <div class="col-sm-9">    
        <div class="mt-5">
            <a href="{{ url('books/create') }}" class="btn btn-success float-right">Submit Books</a>
            <h1>{{ $genre->name }} Books</h1>
        </div>
        <div class="list-group">
        @foreach ($genre->books as $book)
            <a href="{{ url('books', [$book->id]) }}" class="list-group-item">
                <h2 class="list-group font-weight-bold">{{ $book->title }}</h2>
                <p class="list-group-item-text">
                    Started on: {{ $book->created_at }}
                </p>
            </a>    
        @endforeach
        </div>
    </div>
    @include('shared.books_sidebar')
</div>
@endsection

    
