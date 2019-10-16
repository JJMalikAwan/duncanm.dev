<article class="mb-4 border-b-4 border-gray-400 py-4 px-2">
    <a href="{{ route('posts.show', ['post' => $post]) }}">
        <h2 class="leading-loose mb-2 text-2xl font-semibold">{{ $post->title }}</h2>
        <p>{{ substr(strip_tags($post->markdown), 0, 140) }}</p>
    </a>
</article>
