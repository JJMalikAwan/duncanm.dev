@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')
    <div class="mini-container">
        <header class="border-b-2 border-gray-400 mb-6 px-2 py-4">
            <h1 class="text-4xl mb-2">Page Not Found</h1>
        </header>

        <div class="content-area">
            <p>This page can't be found. Please <a href="/">go home</a>.</p>
        </div>
    </div>
@endsection
