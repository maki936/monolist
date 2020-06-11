<div class="row pt-5">
    @foreach($posts as $post) 
    <div class="col-12 col-sm-6 col-lg-3">
        
        <a href="/posts/{{$post->id}}/posts">
            {{--<img src="/storage/{{ $post->image }}" class="card-img-top">--}}
            <img src={{ $post->image }} class="w-100">
        </a>
            
            
        <div class="media pt-3 pb-4">
            <img class="mr-2 rounded" src="{{ Gravatar::src($post->user->email, 50) }}" alt="">
            <div class="media-body">
                <a href="/profile/{{ $post->user->id }}">
                    <span class="text-dark">{!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!}</span> 
                    <span class="text-muted">posted at {{ $post->created_at }}</span>
                </a>
                <p class="mb-0">{!! nl2br(e($post->title)) !!}</p>
                @if (Auth::id() == $post->user_id)
                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete', 'class' => 'form-inline']) !!}
                        {{--<input class="btn btn-danger btn-sm" type="submit" value="Delete">--}}
                        {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm offset-md-4 btn-sm-4']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
             
    </div>    
    @endforeach
</div>
{{ $posts->links('pagination::bootstrap-4') }}
