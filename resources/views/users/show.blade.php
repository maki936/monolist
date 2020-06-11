@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <aside class="col-lg-2">
                @include('users.card', ['user' => $user])
            </aside>
            <div class="col-lg-8">
                @include('users.navtabs', ['user' => $user])
                {!! link_to_route('posts.create', 'Item登録', [], ['class' => 'btn btn-secondary']) !!}
            </div>
        </div>
    </div>
        <div>
            @if (count($posts) > 0)
                @include('posts.posts')
            @endif
        </div>
@endsection


{{--ここからpost内容
<div class="row pt-5">
    @foreach($user->posts as $post)
    <div class="col-4 pb-4">
        <img src="/storage/{{ $post->image }}" class="w-100">
            @if (count($posts) > 0)
                @include('posts.posts', ['posts' => $posts])
            @endif
    </div>
    @endforeach
</div>--}}