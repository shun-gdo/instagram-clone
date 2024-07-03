<div class="mt-4">
    @if (isset($posts))
        <!--<ul class="list-none">-->
            @foreach ($posts as $post)
                @include('posts.post_card')
            @endforeach
        <!--</ul>-->

    @endif
</div>