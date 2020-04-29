@extends('layouts.admin')

@section('title', 'Add a New Genre')

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
    

    {!! Form::model($genre, ['route' => 'genres.store']) !!}
    @csrf
    @include('admin.genres.partials.object_form')
    {!! Form::submit('Add Genre', ['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}

    
@endsection