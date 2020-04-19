@extends('layouts.master')

@section('title', 'Search results for "'. $q .'"')

@section('content')
<div class="row">
    <div class="col-sm-9">   
        <div class="mt-5">
            <a href="{{ url('books/create') }}" class="btn btn-info float-right">Add book</a>
        <h1>Search results for "{{ $q }}"</h1>
        </div>

        @include('books.partials.books')
    </div>
    @include('shared.books_sidebar')
</div>
@endsection


