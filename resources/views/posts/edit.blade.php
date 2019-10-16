@extends('layouts.app')

@section('content')
    <form action="{{ route('posts.update', ['post' => $post]) }}" method="post" class="mini-container">
        @csrf

        <header class="border-b-2 border-gray-400 mb-6 px-2 py-4">
            <input class="text-4xl mb-2 w-full" type="text" name="title" value="{{ old('title') ?? $post->title }}">
            <h3 class="text-sm">Posted on {{ $post->date }}.</h3>
        </header>

        <div class="content-area">
            <textarea name="markdown" cols="30" rows="10">{{ old('markdown') ?? $post->markdown }}</textarea>
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
