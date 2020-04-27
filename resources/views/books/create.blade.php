@extends('layouts.app')

@section('title', 'Add a New Book')

@section('content')
    <div class="font-weight-bold mt-5">
        <h1>Add a new book</h1>
        <span class="float-right pb-2"><a href="/" class="btn btn-primary">Go Back</a></span>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    
    

    {!! Form::model($book, ['action' => 'BookController@store']) !!}
    @csrf
    @include('books.partials.object_form')
    {!! Form::submit('Add Book', ['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}

    
@endsection