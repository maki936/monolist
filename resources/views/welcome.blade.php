@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div>
            @if (Auth::id() == $user->id)
                {!! Form::open(['route' => 'posts.store']) !!}
                {!! Form::close() !!}
            @endif
            @include('posts.posts', ['posts' => $posts])
        </div>
        
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the monolist</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-secondary']) !!}
            </div>
        </div>
    @endif
    
@endsection
