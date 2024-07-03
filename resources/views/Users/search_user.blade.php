@extends('layouts.app')
@section('content')
    <div>
        <form action="{{ route('search') }}" method="GET" class="mb-4">
        <label class="input input-bordered flex justify-between items-center gap-2">
            @if(isset($initialValue))
            <input type="text" class="grow" placeholder="Search" value="{{ $initialValue }}" />
            @else
            <input name="search" type="text" class="grow" placeholder="Search" />
            @endif
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 16 16"
              fill="currentColor"
              class="h-4 w-4 opacity-70">
                <path
                fill-rule="evenodd"
                d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                clip-rule="evenodd" />
            </svg>
        </label>
        </form>
        
        @if(isset($users))
            @foreach ($users as $user)
            <a href="{{ route('users.show',$user->id) }}">
                <div class="h-16 px-3 font-bold border border-gray rounded grid grid-cols-6 gap-4 items-center">
                    <div class="col-span-1">{{ $user->id }}</div>
                    <div class="col-span-3">{{ $user->name }} <span class="inline text-gray-400">( {{ $user->email }} )</span></div>
                    <div class="btn btn-sm col-span-1 col-end-7">Follow</div>
                </div>
            </a>
            @endforeach
        @endif
    </div>
@endsection