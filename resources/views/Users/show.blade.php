@extends('layouts.app')
@section('content')
    <div class="w-3/5 mx-auto grid grid-cols-3 gap-4">
        <div class="col-span-3 flex justify-between items-center">
            <div class="font-bold">
                {{ $user->name }} <span class="text-gray-400">({{ $user->email }})</span>    
            </div>
            <div>
                @include('Users.user_follow_button')
            </div>
            
        </div>
        @foreach ($posts as $post)
            <div class="relative rounded">
                <img src="{{ asset('/storage/images/'.$post->img_name) }}" class="aspect-square w-full rounded-lg" >
                
                <div class="absolute rounded-lg top-0 left-0 bg-black bg-opacity-50 w-full h-full z-50 opacity-0 hover:opacity-100 transition-opacity">
                    <p class="color-white">    
                    ここにいいねカウント
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection