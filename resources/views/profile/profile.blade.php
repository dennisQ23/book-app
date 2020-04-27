@extends('layouts.app');

@section('title', 'My Profile')

@section('content')
    <div class="card card-header">
        <h1>My Profile</h1>
        <h2>Submitted Books</h2>
        @include('books.partials.books', ['books' => $books])

        <h2>Submitted Comments</h2>
        <ul class="list-group">
            @foreach ($comments as $comment)
                <li class="list-group-item">
                    <div class="text-muted">
                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    <p><small>Book:</small><strong>{{ $comment->book->title}} </strong></p>
                    <p>{{ $comment->comment }}</p>                    
                </li>
            @endforeach
        
    </div>
@endsection