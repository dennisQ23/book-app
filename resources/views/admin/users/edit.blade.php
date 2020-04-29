@extends('layouts.admin')

@section('title', 'Edit a Userk')

@section('content')
    <div class="font-weight-bold mt-5">
        <h1>Update book</h1>
        <span class="float-right pb-2"><a href="/" class="btn btn-primary">Go Back</a></span>
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
    

    {!! Form::model($user, ['action' => ['Admin\UserController@update', $user->id], 'method' => 'put']) !!}
    @csrf
    @include('admin.users.partials.object_form')
    {!! Form::submit('Update User', ['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}

    @include('admin.users.partials.delete_object')

    
@endsection