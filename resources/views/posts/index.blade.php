@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <div class="mini-container">
        @foreach($posts as $preview)
            @include('partials.post')
        @endforeach
    </div>
@endsection
