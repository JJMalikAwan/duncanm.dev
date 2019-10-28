<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Duncan McClean, a Laravel and Statamic Developer</title>
    <link rel="stylesheet" href="{{ mix('static/css/app.css') }}">
    <link rel="alternate" type="application/atom+xml" title="All Duncan McClean's Posts" href="/feed">
    <meta name="description" content="Duncan McClean is a Web Developer and Student from Scotland.">
    <meta property="og:site_name" content="duncanm.dev">
    <meta property="og:locale" content="en_US">
    <meta property="og:description" content="Duncan McClean is a Web Developer and Student from Scotland.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ config('app.url') }}/static/images/duncan.jpg">

    @if(isset($post))
        <meta property="og:title" content="{{ $post->title }} | duncanm.dev"/>
        <meta property="og:description" content="{{ $post->summary() }}"/>

        <meta property="article:published_time" content="{{\Carbon\Carbon::parse($post->is_published)->toIso8601String() }}"/>
        <meta property="og:updated_time" content="{{ \Carbon\Carbon::parse($post->updated_at)->toIso8601String() }}"/>

        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:description" content="{{ $post->summary() }}"/>
        <meta name="twitter:title" content="{{ $post->title }} | duncanm.dev"/>
        <meta name="twitter:site" content="@damcclean"/>
        <meta name="twitter:image" content="{{ config('app.url') }}/static/images/duncan.jpg"/>
        <meta name="twitter:creator" content="@damcclean"/>
    @endif

    @if(config('app.env') === 'production')
        <!-- Fathom - simple website analytics - https://github.com/usefathom/fathom -->
        <script>
            (function(f, a, t, h, o, m){
                a[h]=a[h]||function(){
                    (a[h].q=a[h].q||[]).push(arguments)
                };
                o=f.createElement('script'),
                    m=f.getElementsByTagName('script')[0];
                o.async=1; o.src=t; o.id='fathom-script';
                m.parentNode.insertBefore(o,m)
            })(document, window, '//fathom.littlepenguin.dev/tracker.js', 'fathom');
            fathom('set', 'siteId', 'JCXEQ');
            fathom('trackPageview');
        </script>
        <!-- / Fathom -->
    @endif

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/styles/atom-one-light.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</head>
<body class="text-gray-800">
    <div id="app">
        @auth
            <div class="fixed bottom-0 right-0 mx-2 flex flex-row-reverse items-center">
                <a class="bg-gray-800 px-6 py-2 mx-2 rounded-t-lg text-center text-white font-medium" href="{{ route('logout') }}">Logged in</a>
                <a class="bg-gray-700 px-6 py-2 mx-2 rounded-t-lg text-center text-white font-medium" href="{{ route('posts.create') }}">Create Post</a>
            </div>
        @endauth

        <header id="header" class="w-full mb-12">
            <div class="border-b py-4 px-2 border-gray-200 container mx-auto flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="flex flex-row justify-between">
                    <a class="flex flex-row items-center" href="/">
                        <img class="w-12 h-12 rounded-full mr-4" src="/static/images/duncan.jpg" alt="Duncan McClean">
                        <strong class="font-medium text-lg">Duncan McClean</strong>
                    </a>

                    <button class="md:hidden font-bold text-sm p-2" @click="toggleNav">
                        Menu
                    </button>
                </div>

                <nav class="flex flex-col md:flex-row md:items-center mt-6 md:mt-0" :class="{ 'hidden md:flex' : !isNavToggled }">
                    <a class="md:mx-4 font-bold text-sm p-2 border-b-2 border-transparent @if(url()->current() === route('posts.index')) border-gray-400 @endif hover:border-gray-400" href="{{ route('posts.index') }}">
                        Posts
                    </a>
                    <a class="md:mx-4 font-bold text-sm p-2 border-b-2 border-transparent @if(url()->current() === route('about')) border-gray-400 @endif hover:border-gray-400" href="{{ route('about') }}">
                        About
                    </a>
                    <a class="md:mx-4 font-bold text-sm p-2 border-b-2 border-transparent @if(url()->current() === route('newsletter')) border-gray-400 @endif hover:border-gray-400" href="{{ route('newsletter') }}">
                        Newsletter
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

    <script src="{{ mix('static/js/app.js') }}"></script>
</body>
</html>
