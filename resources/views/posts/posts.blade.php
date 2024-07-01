<div class="mt-4">
    @if (isset($posts))
        <ul class="list-none">
            @foreach ($posts as $post)
                <li class="flex items-start gap-x-2 mb-4">
                    {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                   
                    <div>

                        <div>
                            {{-- 投稿内容 --}}
                            <p class="mb-0">{{ ($post->caption) }}</p>
                            <img src="{{ asset('/storage/images/'.$post->img_name) }}" />
                        </div>
                        
                        
                    </div>

                </li>
            @endforeach
        </ul>

    @endif
</div>