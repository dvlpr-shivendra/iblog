@extends('layouts.app')

@section('content')
    @forelse ($posts as $post)
    <div class="box">
        <article class="media">
          <div class="media-left">
            <figure class="image is-64x64">
              <img src="{{ Storage::url($post->thumbnail) }}" alt="Image">
            </figure>
          </div>
          <div class="media-content">
            <div class="content">
              <p>
                <strong>{{ $post->user->firtname }}</strong> <small>{{ $post->created_at->diffForHumans() }}</small>
                <br>
                {{ $post->title }}
              </p>
              <p>
                  <form action="{{$post->url()}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="button is-danger">Delete</button>
                    <a href="#" class="button is-primary">Edit</a>
                </form>
              </p>
            </div>
          </div>
        </article>
      </div>
    @empty
        <p>No posts here.</p>
    @endforelse
@endsection