@extends('layouts.app')

@section('content')

@php $post = \App\Post::latest()->first() @endphp

<section class="hero is-link is-fullheight-with-navbar">
  <div class="hero-body animated fadeIn">
    <div class="container">
      <p class="m-b-5">Featured post</p>
      <h1 class="title m-b-25">
        {{$post->title}}
      </h1>
      <p class="animated fadeIn is-size-5">{{$post->description}}</p>
      <a class="button is-light m-t-25 has-text-weight-bold" 
        href="{{ $post->url() }}"
      >Read Post</a>
      <a class="button is-light is-outlined m-t-25" 
        href="{{ route('posts.index') }}"
      >Browse Posts</a>
    </div>
  </div>
</section>

@endsection