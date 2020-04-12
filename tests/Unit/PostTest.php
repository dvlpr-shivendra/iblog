<?php

namespace Tests\Unit;

use App\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function post_has_tags()
    {
        $post = $this->createPost();
        self::assertInstanceOf(Collection::class, $post->tags);
    }

    /** @test */
    public function post_can_have_tags()
    {
        $firstTag = Tag::create(['title' => 'lorem']);
        $secondTag = Tag::create(['title' => 'ipsum']);
        $tags = [$firstTag->id, $secondTag->id];
        $post = $this->createPost($tags);
        $this->assertEquals($post->tags()->pluck('tags.id')->toArray(), $tags);
    }

}
