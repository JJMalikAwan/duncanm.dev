<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function user_can_view_post_index()
    {
        $posts = factory(Post::class, 15)->create();

        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee($posts[0]['title'])
            ->assertSee($posts[2]['title'])
            ->assertSee($posts[5]['title'])
            ->assertSee($posts[7]['title'])
            ->assertSee($posts[9]['title'])
            ->assertSee($posts[11]['title'])
            ->assertSee($posts[13]['title'])
            ->assertSee($posts[14]['title']);
    }

    /** @test */
    public function admin_can_create_post()
    {
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->get('/create');

        $response
            ->assertOk();
    }

    /** @test */
    public function admin_can_store_post()
    {
        $user = factory(User::class)->create();

        $title = $this->faker->title;

        $response = $this
            ->actingAs($user)
            ->post('/create', [
                'title' => $title,
                'markdown' => $this->faker->text
            ]);

        $response
            ->assertRedirect();

        $this
            ->assertDatabaseHas('posts', [
                'title' => $title
            ]);
    }

    /** @test */
    public function user_can_show_post()
    {
        $post = factory(Post::class)->create();

        $response = $this
            ->get('/'.$post->slug);

        $response
            ->assertOk()
            ->assertSee($post->title);
    }

    /** @test */
    public function admin_can_edit_post()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();

        $response = $this
            ->actingAs($user)
            ->get('/'.$post->slug.'/edit');

        $response
            ->assertOk()
            ->assertSee($post->title);
    }

    /** @test */
    public function admin_can_update_post()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();

        $title = $this->faker->title;

        $response = $this
            ->actingAs($user)
            ->post('/'.$post->slug.'/edit', [
                'title' => $title,
                'markdown' => $this->faker->text
            ]);

        $response
            ->assertRedirect('/'.$post->slug);
    }

    /** @test */
    public function admin_can_destroy_post()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();

        $response = $this
            ->actingAs($user)
            ->get('/'.$post->slug.'/delete');

        $response
            ->assertRedirect('/');
    }
}
