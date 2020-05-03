<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravelista\Comments\Commentable;

class Post extends Model
{
    use Commentable;

    protected $guarded = [];

    public function url() {
        return url("posts/{$this->slug}");
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function deleteBodyImages()
    {
        preg_match_all('/post-images\/[\w]+\.[jpngif]{3}/', $this->body, $images);
        $images = array_unique($images);
        foreach ($images as $image) {
            Storage::delete($image);
        }
    }
}
