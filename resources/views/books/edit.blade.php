@extends('layouts.app')

@section('title', 'Update Book')

@section('content')
    <div class="font-weight-bold mt-5">
        <h1>Update book</h1>
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
    

    {!! Form::model($book, ['action' => ['BookController@update', $book->id], 'method' => 'put']) !!}
    @csrf
    @include('books.partials.object_form')
    {!! Form::submit('Update Book', ['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}

    @include('books.partials.delete_object')

    
@endsection