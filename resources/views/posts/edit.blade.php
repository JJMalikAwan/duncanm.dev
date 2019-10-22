@extends('layouts.app')

@section('title', 'Edit: '.$post->title)

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

        <h3 class="mt-8 mb-2 text-3xl">Extra Fields</h3>

        <div>
            <label for="slug">Slug</label>
            <input type="text" name="slug" value="{{ $post->slug }}" placeholder="{{ str_replace(' ', '-', strtolower($post->title)) }}">
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
