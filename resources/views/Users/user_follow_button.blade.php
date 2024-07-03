@if(Auth::id() != $user->id)
    @if(!Auth::user()->isFollow($user->id))
        <form method="POST" action="{{ route('user.follow', $user->id) }}" class="col-span-1 col-end-7">
            @csrf
            <button class="btn btn-sm col-span-1 col-end-7">Follow</button>
        </form>
    @else
        <form method="POST" action="{{ route('user.unfollow', $user->id) }}" class="col-span-1 col-end-7">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-neutral">Unfollow</button>
        </form>
    @endif
@endif