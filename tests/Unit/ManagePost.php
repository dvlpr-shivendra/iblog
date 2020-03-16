<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManagePost extends TestCase
{

    use RefreshDatabase, WithFaker;
    /** @test */
    public function guest_can_not_manage_posts()
    {
        $this->createPost();
        $this->get('posts/create')->assertStatus(403);
        $this->post('posts')->assertStatus(403);
        $this->delete('posts/1')->assertStatus(403);
        $this->put('posts/1')->assertStatus(403);
    }

    /** @test */
    public function admin_can_manage_post()
    {
        $this->withoutExceptionHandling();
        $user = $this->signIn();
        $user->assignRole('admin');
        $this->get('posts/create')->assertStatus(200);
        $attributes = [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
        ];
        $this->post('posts', $attributes);
        $this->assertDatabaseHas('posts', $attributes);
        $this->get('posts/1/edit')->assertStatus(200);
        $attributes['title'] = "Test Title";
        $this->put('posts/1', $attributes);
        $this->assertDatabaseHas('posts', $attributes);
        $this->delete('posts/1');
        $this->assertDatabaseMissing('posts', $attributes);
    }

}
