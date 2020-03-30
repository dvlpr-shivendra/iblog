<?php

namespace App\Http\Controllers;

use App\Post;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostController extends Controller
{

    /**
     * @return View
     */
    public function index()
    {
        $posts = Post::latest()->paginate(20);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post) {
        return \view('posts.show', compact('post'));
    }

    /**
     * @return RedirectResponse
     */
    public function store() {
        $attributes = $this->validateAttributes();
        $attributes['thumbnail'] = request()
            ->file('thumbnail')
            ->store('thumbnails');

        auth()->user()->posts()->create($attributes);
        return redirect('posts');
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * @param Post $post
     * @return View
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact($post));
    }

    /**
     * @param Post $post
     * @return View
     */
    public function update(Post $post)
    {
        $attributes = $this->validateAttributes();
        $post->update($attributes);
        return view('posts.create');
    }

    /**
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post) {
        try {
            $post->delete();
            return redirect('posts')->with('success', 'Post Deleted.');
        } catch (Exception $e) {
            return redirect('posts')->with('error', $e->getMessage());
        }
    }

    /**
     * @param Post $post
     * @return int|mixed
     */
    public function like(Post $post) {
        $post->likes += 1;
        $post->save();
        return $post->likes;
    }

    /**
     * @return string
     */
    public function fileUpload() {
        $file = request()->file('image')->store('post-images');
        return Storage::url($file);
    }

    /**
     * @return array
     */
    private function validateAttributes()
    {
        return request()->validate([
            'title' => 'required',
            'body' => 'required',
            'description' => 'required',
        ]);
    }
}
