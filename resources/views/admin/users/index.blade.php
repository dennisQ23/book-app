@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <div class="card card-header">
        <h1>Users</h1>
    </div>

    <ul class="list-group">
        @foreach ($users as $user)
            <li class="list-group-item">
                <a href="{{ route('users.edit', $user->id) }}" 
                    class="btn btn-info btn-xs float-right">Edit
                </a>
                {{-- <a href="#" class="btn btn-info btn-xs float-right">Edit</a> --}}
                {{ $user->name }}
                <br>
                {{ $user->email }}
                <br>
                <strong>Roles:</strong>
                <ul>
                    @foreach ($user->roles as $role)
                        <li>{{ $role->name }} </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endsection