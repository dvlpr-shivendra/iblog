<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
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
}
