<article class="mb-4 border-b-4 border-gray-400 py-4 px-2">
    <a href="{{ route('posts.show', ['post' => $post]) }}">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-2">
            <h2 class="leading-loose text-2xl font-semibold">{{ $post->title }}</h2>
            <h3 class="text-sm">{{ $post->date }}</h3>
        </div>

        <p>{{ $post->summary() }}</p>
    </a>

    @auth
        <div class="mt-6 flex flex-row items-center justify-between">
            <a class="mt-2 text-gray-700 font-medium mt-4 block" href="{{ route('posts.edit', ['post' => $post]) }}">Edit post</a>
            <a class="mt-2 text-red-700 font-medium mt-4 block" href="{{ route('posts.destroy', ['post' => $post]) }}">Delete</a>
        </div>
    @endauth
</article>
