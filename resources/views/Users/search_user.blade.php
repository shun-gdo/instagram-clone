@extends('layouts.app')
@section('content')
    <div>
        <form action="{{ route('search') }}" method="GET">
        <label class="input input-bordered flex justify-between items-center gap-2">
            @if(isset($initilaValue))
            <input type="text" class="grow" placeholder="Search" value="{{ $initilaValue }}" />
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
            <div>
                <p>{{$user->id}}:{{ $user->name }}:{{ $user->email }}</p>
            </div>
            @endforeach
        @endif
    </div>
@endsection