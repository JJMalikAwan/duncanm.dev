@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <form action="{{ route('posts.store') }}" method="post" class="mini-container">
        @csrf

        <header class="border-b-2 border-gray-400 mb-6 px-2 py-4">
            <input class="text-4xl mb-2 w-full" type="text" name="title" value="{{ old('title') }}" placeholder="Wonderful title goes here">
            <h3 class="text-sm">Will be posted on {{ now()->toFormattedDateString() }}.</h3>
        </header>

        <div class="content-area">
            <textarea name="markdown" cols="30" rows="10">{{ old('markdown') ?? 'This is where the story starts...' }}</textarea>
        </div>

        <button type="submit">Create</button>
    </form>
@endsection
