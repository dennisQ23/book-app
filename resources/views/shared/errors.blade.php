{{-- @if (count(session('errors')) > 0)
    <div class="alert alert-danger">
        @foreach (session('error')->all as $error)
            {{ $error }}<br>
        @endforeach
    </div>
@endif --}}

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif