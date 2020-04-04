<?php

namespace Tests\Unit;

use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
        Storage::fake('local');
        $attributes = [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'description' => $this->faker->paragraph,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg'),
        ];
        $this->post('posts', $attributes);
        $attributes['thumbnail'] = Post::first()->thumbnail;
        $this->assertDatabaseHas('posts', $attributes);
        $this->get('posts/1/edit')->assertStatus(200);
        $attributes['title'] = "Test Title";
        $this->put('posts/1', $attributes);
        $this->assertDatabaseHas('posts', $attributes);
        $this->delete('posts/1');
        $this->assertDatabaseMissing('posts', $attributes);
        Storage::disk('local')->assertExists($attributes['thumbnail']);
    }

    /** @test */
    public function wysiwyg_image_upload()
    {
        $this->signIn()->assignRole('admin');
        Storage::fake('local');
        $response = $this->post('/posts/file-upload', [
            'image' => UploadedFile::fake()->image('test.jpg')
        ])->assertStatus(200);

        $imagePath = ltrim($response->content(), '/storage');
        Storage::disk('local')->assertExists($imagePath);
    }


}
