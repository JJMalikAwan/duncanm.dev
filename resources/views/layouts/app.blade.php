<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Duncan McClean</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="alternate" type="application/atom+xml" title="News" href="/feed">
</head>
<body class="text-gray-800">
    <div id="app">
        @auth
            <div class="fixed bottom-0 right-0 bg-gray-800 px-6 py-2 rounded-t-lg mx-2 text-center text-white font-medium">
                Logged in
            </div>
        @endauth

        <header id="header" class="w-full mb-12">
            <div class="border-b py-4 px-2 border-gray-200 container mx-auto flex flex-row items-center justify-between">
                <a class="flex flex-row items-center" href="/">
                    <img class="w-12 h-12 rounded-full mr-4" src="https://damcclean-blog.s3.amazonaws.com/duncan.jpg" alt="Duncan McClean">
                    <strong class="font-medium text-lg">Duncan McClean</strong>
                </a>

                <nav class="flex flex-row items-center">
                    <a class="mx-4 font-bold text-sm p-2 border-b-2 border-transparent @if(url()->current() === route('posts.index')) border-gray-400 @endif hover:border-gray-400" href="{{ route('posts.index') }}">
                        Posts
                    </a>
                    <a class="mx-4 font-bold text-sm p-2 border-b-2 border-transparent @if(url()->current() === route('about')) border-gray-400 @endif hover:border-gray-400" href="{{ route('about') }}">
                        About
                    </a>
                </nav>
            </div>
        </header>

        <main class="container mx-auto">
            @yield('content')
        </main>

        <footer id="footer" class="w-full mt-12">
            <div class="border-t py-4 px-2 border-gray-200 container mx-auto">
                <p class="text-center text-sm text-gray-700 font-medium">&copy {{ now()->format('Y') }} Duncan McClean</p>
            </div>
        </footer>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
