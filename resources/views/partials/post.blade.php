<article class="mb-4 border-b-4 border-gray-400 py-4 px-2">
    <a href="{{ route('posts.show', ['post' => $preview]) }}">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-2">
            <h2 class="leading-loose text-2xl font-semibold">{{ $preview->title }}</h2>
            <h3 class="text-sm">{{ $preview->date }}</h3>
        </div>

        <p>{{ $preview->summary() }}</p>
    </a>

    @auth
        <div class="mt-6 flex flex-row items-center justify-between">
            <a class="mt-2 text-gray-700 font-medium mt-4 block" href="{{ route('posts.edit', ['post' => $preview]) }}">Edit post</a>
            <a class="mt-2 text-red-700 font-medium mt-4 block" href="{{ route('posts.destroy', ['post' => $preview]) }}">Delete</a>
        </div>
    @endauth
</article>
