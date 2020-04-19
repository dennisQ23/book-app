@extends('layouts.master')

@section('title', 'Edit Genre')

@section('content')
    <div class="font-weight-bold mt-5">
        <h1>Edit genre</h1>
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
    

    {!! Form::model($genre, ['route' => ['genres.update', $genre->id], 'method' => 'put']) !!}
    @csrf
    @include('genres.partials.object_form')
    {!! Form::submit('Update Genre', ['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}
    
    @include('genres.partials.delete_object')
    
@endsection