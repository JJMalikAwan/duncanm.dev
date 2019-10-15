<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'posts' => Post::orderBy('is_published', 'asc')->get()
        ]);
    }
}
