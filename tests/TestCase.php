<?php

namespace Tests;

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

    protected function createPost()
    {
        $user = $this->signIn();
        Storage::fake('thumbnails');
        $post = $user->posts()->create([
            'title' => 'Test title',
            'body' => 'Test body',
            'description' => 'Test description',
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg'),
        ]);
        auth()->logout();
        return $post;
    }
}
