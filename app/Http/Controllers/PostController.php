<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Jobs\PublishOnDevTo;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::published()->get()
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $validated = $request->validated();

        $post = new Post();
        $post->title = $request->title;
        $post->slug = str_replace(' ', '-', strtolower($request->title));
        $post->markdown = $request->markdown;
        $post->is_published = now();
        $post->posted_on_dev_to = false;
        $post->save();

        PublishOnDevTo::dispatchNow($post);

        return redirect(route('posts.show', ['post' => $post]));
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post->title = $request->title;
        $post->markdown = $request->markdown;
        $post->save();

        return redirect(route('posts.show', ['post' => $post]));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route('posts.index'));
    }
}
