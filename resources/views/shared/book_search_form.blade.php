{!! Form::open([
        'action' => 'BookController@search',
        'method' => 'get',
        'class' => 'navbar-form navbar-right'
    ]) 
!!}

<div class="input-group">
    {{!! Form::text('q', Request::input('q'), ['class' => 'form-control', 'placeholder' => 'Search for...']) !!}}
    <span class="input-group-btn">
        <button type="submit" class="btn btn-info">Go!</button>
    </span>
</div>

{!! Form::close() !!}