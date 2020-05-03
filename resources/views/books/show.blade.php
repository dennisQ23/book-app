@extends('layouts.app')

@section('title', $book->title)

@section('content')
    <div class="mt-5">
        <a href="{{ action('BookController@edit', $book->id) }}" class="btn btn-info float-right">Edit</a>
        <h1><?php echo $book->title ?></h1>
    </div>
    
    <p><?php echo $book->description ?></p>
    <P>{{ $book->status }}</P>
    <p>Book started on <?php echo $book->created_at ?></p>    
    
    @include('books.comments.partials.display')

@endsection

    
