@extends('layouts.app')

@section('content')
    <div class="mini-container">
        <header class="border-b-2 border-gray-400 mb-6 px-2 py-4">
            <h1 class="text-4xl mb-2">{{ $post->title }}</h1>
            <h3 class="text-sm">Posted on {{ $post->date }}.</h3>
        </header>

        <div class="content-area">
            {!! $post->markdown !!}
        </div>

        @auth
            <div class="border-t-2 border-gray-400 mt-6 flex flex-row items-center justify-between">
                <a class="mt-2 text-gray-700 font-medium mt-4 block" href="{{ route('posts.edit', ['post' => $post]) }}">Edit post</a>
                <a class="mt-2 text-red-700 font-medium mt-4 block" href="{{ route('posts.destroy', ['post' => $post]) }}">Delete</a>
            </div>
        @endauth
    </div>
@endsection
