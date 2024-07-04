@if(isset($post))
    <div class="my-4">
        <div class="card bg-base-200 w-3/5 ml-auto mr-auto shadow-xl">
            <div class="card-body font-bold">
                <a href="{{ route('users.show',$user->id) }}">
                    {{ $post->user->name }} <span class="text-gray-400">({{ $post->user->email }})</span>    
                </a>
            </div>
            <figure>
                <img src="{{ asset('/storage/images/'.$post->img_name) }}"
                    class="object-cover aspect-square w-full" />
            </figure>
            <div class="card-body">
                <div class="flex items-start">
                    @if($user->isFavorited($post->id))
                    <form method="POST" action="{{ route('favorite.destroy',['post_id'=>$post->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 fill-favorite-pink">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </button>
                    </form>
                    @else
                    <form method="POST" action="{{ route('favorite.store',['post_id'=>$post->id]) }}">
                        @csrf
                        @method('POST')
                        <button type="submit" class="mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 hover:fill-favorite-pink">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </button>
                    </form>
                    @endif
                    
                    <div>{{ $post->favorite_count() }}</div>
                </div>

                <p>{!! nl2br(e($post->caption)) !!}</p></p>
                <p class="text-gray-400">{{ $post->created_at->format('Y年m月d日') }}</p>
            </div>
        </div>
    </div>
    <hr>
@endif