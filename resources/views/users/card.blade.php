<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ $user->name }}</h4>
    </div>
    <div class="card-body">
        <img src="{{ $user->image }}" class="rounded img-fluid" alt="">
    </div>
</div>
@include('user_follow.follow_button', ['user' => $user])

{{--<img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">--}}