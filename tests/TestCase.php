<?php

namespace Tests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null)
    {
        if  (!$user) {
            $this->artisan('db:seed --class=PermissionSeeder');
            $user = factory('App\User')->create();
        }

        $this->actingAs($user);

        return $user;
    }

    protected function createPost($tags = [])
    {
        $user = $this->signIn();
        Storage::fake('local');
        $post = $user->posts()->create([
            'title' => 'Test title',
            'body' => $title = 'Test title',
            'slug' => Str::slug($title),
            'description' => 'Test description',
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg'),
        ]);
        if($tags) $post->tags()->attach($tags);
        auth()->logout();
        return $post;
    }
}
