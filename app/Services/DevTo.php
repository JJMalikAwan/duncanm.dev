<?php

namespace App\Services;

use Zttp\Zttp;

class DevTo
{
    public $base = 'https://dev.to/api';

    public function __construct()
    {
        if (config('app.services.dev') === null) {
            return null;
        }
    }

    public function createArticle($post)
    {
        $response = Zttp::withHeaders([
            'api-key' => config('services.dev.key')
        ])->post($this->base.'/articles', [
            'article' => [
                'title' => $post->title,
                'published' => true,
                'body_markdown' => $post->markdown,
                'canonical_url' => config('app.url').route('posts.show', ['post' => $post])
            ]
        ]);

        $post->posted_on_dev_to = true;
        $post->save();

        return $response->json();
    }
}
