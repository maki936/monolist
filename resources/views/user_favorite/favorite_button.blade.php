@if (Auth::user()->is_favorites($post->id))
    {!! Form::open(['route' => ['favorites.unfavorite', $post->id], 'method' => 'delete',]) !!}
        {{--<input class="btn btn-primary" type="submit" value="Favorite">--}}
        {!! Form::submit('Unfavorite', ['class' => "btn btn-danger col-sm offset-md-2"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorites.favorite', $post->id],'class' => 'form-inline']) !!}
        {{--<input class="btn btn-primary" type="submit" value="Favorite">--}}
        {!! Form::submit('favorite', ['class' => "btn btn-secondary col-sm offset-md-2"]) !!}
    {!! Form::close() !!}
@endif

 {{--'class' => 'form-inline'--}}