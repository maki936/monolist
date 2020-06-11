@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <aside class="col-sm-2">
                @include('users.card', ['user' => $user])
            </aside>
            <div class="col-sm-8">
                @include('users.navtabs', ['user' => $user])
            </div>
        </div>
    </div>
    
    <div>
        @include('posts.posts', ['posts' => $post])
    </div>
    
@endsection