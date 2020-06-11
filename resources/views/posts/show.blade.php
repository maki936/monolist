@extends('layouts.app')

@section('content')
    <div class="media-body">
        {{--<img src="/storage/{{ $post->image }}" class="w-50">--}}
        <img src={{ $post->image }} class="w-50">
        <div class="pt-4 font-weight-bold">
            {{ $post->title }}
        </div>
        <div class="pt-5>
            <a href="/profile/{{ $post->user->id }}">
            <span class="text-dark">{!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!}</span> 
            <span class="text-muted">posted at {{ $post->created_at }}</span>
            </a>
        </div>
        <div class="pt-2 d-flex">
            {!! link_to_route('posts.comments', 'comment', ['id' => $post->id], ['class' => 'btn btn-secondary']) !!}
            @include('user_favorite.favorite_button', ['post' => $post])    
        </div>
        <div class="pt-5">
            {{ $post->content }}
        </div>
    </div>
    
    <div class="pt-5">
        {!! link_to_route('posts.posts', 'back', ['id' => $post->id], ['class' => 'btn btn-secondary']) !!}
    </div>
    
@endsection