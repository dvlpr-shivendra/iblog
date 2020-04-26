<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Laravelista\Comments\Comment;

class AdminController extends Controller
{
    public function comments()
    {
        $comments = Comment::where('approved', false)->get();
        return view('admin.comments', compact('comments'));
    }

    public function trashComment(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', "Comment Deleted");
    }

    public function approveComment(Comment $comment)
    {
        $comment->approved = true;
        $comment->save();
        return back()->with('success', "Comment Approved");
    }

    public function managePosts()
    {
        $posts = Post::latest()->get();
        return view('admin.posts', compact('posts'));
    }
}
