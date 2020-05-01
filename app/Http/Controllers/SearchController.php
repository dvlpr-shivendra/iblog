<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function post(Request $request)
    {
        $title = $request->title;
        $posts = Post::where('title', 'like', "%$title%")->limit(10)->get();
        return $posts;
    }
}