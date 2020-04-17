@if (count(session('errors')) > 0)
    <div class="alert alert-danger">
        @foreach (session('error')->all as $error)
            {{ $error }}<br>
        @endforeach
    </div>
@endif