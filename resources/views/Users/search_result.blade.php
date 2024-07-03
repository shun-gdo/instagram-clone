 @if(isset($users))
    @foreach ($users as $user)
        <a href="{{ route('users.show',$user->id) }}">
            <div class="h-16 px-3 font-bold border border-gray rounded grid grid-cols-6 gap-4 items-center">
                <div class="col-span-1">{{ $user->id }}</div>
                <div class="col-span-3">{{ $user->name }} <span class="inline text-gray-400">( {{ $user->email }} )</span></div>  
                
                
                @include('Users.user_follow_button')
                
            </div>
        </a>
    @endforeach
@endif