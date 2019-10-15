<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Duncan McClean</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app">
        <header id="header" class="bg-indigo-400 w-full mb-12 p-6">
            <div class="container mx-auto flex flex-row items-center justify-between">
                <a class="flex flex-row items-center" href="/">
                    <img class="w-16 h-16 rounded-full mr-4" src="https://damcclean-blog.s3.amazonaws.com/duncan.jpg" alt="Duncan McClean">

                    <span class="flex flex-col text-sm font-medium">
                        <strong class="font-bold text-xl">Duncan McClean</strong>
                        Teenage Web Developer & College Student
                    </span>
                </a>

                <nav class="flex flex-row items-center">
                    <a class="mx-4 uppercase font-bold text-sm text-black" href="{{ route('home') }}">
                        Home
                    </a>

                    <a class="mx-4 uppercase font-bold text-sm text-black" href="#">
                        Posts
                    </a>
                </nav>
            </div>
        </header>

        <div class="container mx-auto">
            @yield('content')
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
