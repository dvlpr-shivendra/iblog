<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

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
        $post = $user->posts()->create([
            'title' => 'Test title',
            'body' => 'Test body',
        ]);
        auth()->logout();
        return $post;
    }
}
