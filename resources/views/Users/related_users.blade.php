@if(isset($user))
        <div class="inline pr-3"><span class="font-bold inline">{{ $user->followingsCount() }}</span> followings</div>
        <div class="inline"><span class="font-bold inline">{{ $user->followersCount() }}</span> followers</div>
@endif