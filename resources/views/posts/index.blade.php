@extends('layouts.app')

@section('content')
    <div class="mini-container">
        @foreach($posts as $post)
            @include('partials.post')
        @endforeach
    </div>
@endsection
