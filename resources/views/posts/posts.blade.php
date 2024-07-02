<div class="mt-4">
    @if (isset($posts))
        <ul class="list-none">
            @foreach ($posts as $post)
                <li class="flex items-start justify-center gap-x-2 mb-4">
                    
                        <div class="card bg-base-100 w-3/5 shadow-xl">
                            
                            <figure>
                                
                                <img src="{{ asset('/storage/images/'.$post->img_name) }}"
                                class="object-cover aspect-square w-full h-" />
                            </figure>
                            
                            <div class="card-body">
                                <p>user : {{ $user->name }}</p>
                                <p>{{ $post->caption }}</p>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-secondary">Favorite</button>
                                </div>
                            </div>
                        </div>

                </li>
            @endforeach
        </ul>

    @endif
</div>