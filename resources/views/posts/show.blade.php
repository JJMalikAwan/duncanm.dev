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
    </div>
@endsection
