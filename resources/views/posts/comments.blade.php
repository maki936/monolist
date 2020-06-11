@extends('layouts.app')

@section('content')
    <div class="media-body">
        {{--<img src="/storage/{{ $post->image }}" class="w-50">--}}
        <img src={{ $post->image }} class="w-50">
        <div class="pt-5">
            <h6 class="font-weight-bold">{{ $post->title }}</h6>
        </div>
        <div class="pt-2">
            {{ $post->content }}
        </div>
    </div>
    <div class="pt-5">
        <h4>comment</h3>
        <hr>
    </div>
    @foreach($comments as $comment)
        <div class="pt-2">
            <div class="media-body">
                <a href="/profile/{{ $comment->user->id }}">
                    <span class="text-dark">{!! link_to_route('users.show', $comment->user->name, ['id' => $comment->user->id]) !!}</span> 
                    <span class="text-muted">posted at {{ $comment->created_at }}</span>
                </a> 
                <div class="pt-1">
                    <p class="mb-0">{!! nl2br(e($comment->content)) !!}</p>
                    @if (Auth::id() == $comment->user_id)
                        {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete', 'class' => 'form-inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm offset-md-4 btn-sm-4']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    
    <div class="row pt-5">
        <div class="form-group col-lg-5"> <!--コメント投稿-->
            {!! Form::open(['route' => 'comments.store']) !!}
                {{ Form::hidden('post_id',$post->id) }}
                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                {!! Form::submit('Post', ['class' => 'btn btn-secondary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    
    <div class="pt-5">
        {!! link_to_route('posts.show', 'back', ['id' => $post->id], ['class' => 'btn btn-secondary']) !!}
    </div>
@endsection