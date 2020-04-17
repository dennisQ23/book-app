@extends('layouts.master')

@section('title', 'Add a New Book')

@section('content')
    <div class="font-weight-bold mt-5">
        <h1>Add a new book</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    

    {!! Form::model($book, ['action' => 'BookController@store']) !!}
    @csrf
    @include('books.partials.object_form')
    {!! Form::submit('Add Book', ['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}

    
@endsection