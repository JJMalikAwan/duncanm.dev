@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="mini-container">
        <header class="border-b-2 border-gray-400 mb-6 px-2 py-4">
            <h1 class="text-4xl mb-2">Login</h1>
        </header>

        <form action="{{ route('login') }}" method="post">
            @csrf

            <div>
                <label for="email">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="duncan@example.com">

                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" value="{{ old('password') }}">

                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
@endsection
