@if (count($users) > 0)
    <li class="list-unstyled">
        @foreach ($users as $user)
            <ul class="media">
                <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>
                    </div>
                </div>
            </ul>
        @endforeach
    </li>
    {{ $users->links('pagination::bootstrap-4') }}
@endif