<article class="mb-4 border-b-4 border-gray-400 py-4 px-2">
    <a href="{{ route('posts.show', ['post' => $post]) }}">
        <div class="flex flex-row items-center justify-between mb-2">
            <h2 class="leading-loose text-2xl font-semibold">{{ $post->title }}</h2>
            <h3 class="text-sm">{{ $post->date }}</h3>
        </div>

        <p>{{ substr(strip_tags($post->markdown), 0, 140) }}</p>

        @auth
            <a class="mt-2 text-gray-700 font-medium mt-4 block" href="{{ route('posts.edit', ['post' => $post]) }}">Edit post</a>
        @endauth
    </a>
</article>
