@extends('layouts.app')
@section('content')
    <div class="w-3/5 mx-auto grid grid-cols-3 gap-4">
        <div class="col-span-3 flex justify-between items-center">
            <div class="font-bold">
                {{ $user->name }} <span class="text-gray-400">({{ $user->email }})</span>    
            </div>
            <div>
                @if(Auth::id() == $user->id)
                    @include('Users.related_users')
                @else
                    @include('Users.user_follow_button')
                @endif
                
                
            </div>
            
        </div>
        @foreach ($posts as $post)
        <a href="{{ route('posts.show',$post->id) }}">
            <div class="relative rounded">
                <img src="{{ asset('/storage/images/'.$post->img_name) }}" class="aspect-square w-full rounded-lg" >
                
                <div class="absolute rounded-lg top-0 left-0 bg-black bg-opacity-50 w-full h-full z-50 opacity-0 hover:opacity-100 transition-opacity">
                    
                    <p class="text-white font-bold absolute top-1/2 left-1/2 flex" style="transform:translate(-50%,-50%);">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                        {{ $post->favorite_count() }}
                    </p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
@endsection