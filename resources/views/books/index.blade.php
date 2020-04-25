@extends('layouts.app')

@section('title', 'Books')

@section('content')
<div class="row">
    <div class="col-sm-9">   
        <div class="mt-5">
            <a href="{{ url('books/create') }}" class="btn btn-info float-right">Add book</a>
            <h1>Books Index</h1>
        </div>

        @include('books.partials.books')
    </div>
    @include('shared.books_sidebar')
</div>
@endsection


