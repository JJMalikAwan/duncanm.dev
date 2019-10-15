@extends('layouts.app')

@section('content')
    <h2 class="text-3xl mb-6">Home</h2>

    @foreach($posts as $post)
        <a class="text-blue-700 mb-8" href="{{ route('post.show', ['post' => $post]) }}">
            <h2 class="text-2xl">{{ $post->title }}</h2>
            <p>{{ substr(strip_tags($post->markdown), 0, 140) }}</p>
        </a>
    @endforeach
@endsection
