<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Exception;
use Illuminate\Support\Str;
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
        if(request('tag')) {
            $posts = Tag::where('title', request('tag'))
                ->firstOrFail()->posts()->paginate(20);
        } else {
            $posts = Post::latest()->paginate(20);
        }
        return view('posts.index', [
          'tags' => Tag::all(),
          'posts' => $posts,
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', compact('post'));
    }

    /**
     * @return RedirectResponse
     */
    public function store() {
        $attributes = $this->validateAttributes();
        $attributes['thumbnail'] = request()
            ->file('thumbnail')
            ->store('thumbnails');

        $attributes['slug'] = Str::slug($attributes['title']);
        
        $post = auth()->user()->posts()->create($attributes);
        $post->tags()->attach(request()->tags);
        return redirect('posts');
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('posts.create', [
            'tags' => Tag::all(),
        ]);
    }

    /**
     * @param Post $post
     * @return View
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'tags' => Tag::all(),
        ]);
    }

    /**
     * @param Post $post
     * @return View
     */
    public function update(Post $post)
    {
        $attributes = $this->validateAttributes();

        if (request()->hasFile('thumbnail')) {
            $attributes['thumbnail'] = request()
            ->file('thumbnail')
            ->store('thumbnails');
        }
    
        $post->update($attributes);
        $post->tags()->detach($post->tags);
        $post->tags()->attach(request()->tags);
        return redirect($post->url());
    }

    /**
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post) {
        if($post->delete()) {
            Storage::delete($post->thumbnail);
            $post->deleteBodyImages();
            return back()->with('success', 'Post Deleted.');
        }
        return back()->with('error', 'Something went wrong.');
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
