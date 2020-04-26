<?php

namespace Tests\Feature;

use App\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostsTest extends TestCase
{

    use WithFaker, RefreshDatabase;

    /** @test */
    public function anyone_can_see_posts()
    {
        $this->withoutExceptionHandling();
        $this->get('posts')->assertStatus(200);
    }

    /** @test */
    public function user_can_see_specific_post()
    {
        $this->withoutExceptionHandling();
        $post = $this->createPost();
        $this->get("posts/{$post->slug}")->assertSee($post->title);
    }

    /** @test */
    public function a_post_requires_a_title()
    {
        $user = $this->signIn();
        $user->assignRole('admin');
        $post = factory('App\Post')->raw(['title' => '']);
        $response = $this->post('posts', $post);
        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_post_requires_a_body()
    {
        $user = $this->signIn();
        $user->assignRole('admin');
        $post = factory('App\Post')->raw(['body' => '']);
        $response = $this->post('posts', $post);
        $response->assertSessionHasErrors('body');
    }

    /** @test */
    public function a_post_requires_a_description()
    {
        $user = $this->signIn();
        $user->assignRole('admin');
        $post = factory('App\Post')->raw(['description' => '']);
        $response = $this->post('posts', $post);
        $response->assertSessionHasErrors('description');
    }

    /** @test */
    public function anybody_can_like_a_post()
    {
        $this->withoutExceptionHandling();
        $post = $this->createPost();
        $likes = $post->likes;
        $response = $this->post("posts/{$post->slug}/like");
        $this->assertEquals(++$likes, $response->content());
    }

}
