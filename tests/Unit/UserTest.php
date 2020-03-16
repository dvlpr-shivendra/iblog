<?php

namespace Tests\Unit;

use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function by_default_user_has_user_role()
    {
        $user = $this->signIn();
        $this->assertEquals('user', $user->roles[0]->name);
    }

    /** @test */
    public function user_has_posts()
    {
        $user = $this->signIn();
        factory(Post::class)->create(['user_id' => $user->id]);
        $this->assertInstanceOf(Collection::class, $user->posts);
    }
}
