@extends('layouts.app')

@section('content')

<section class="hero is-link is-fullheight-with-navbar">
  <div class="hero-body">
    <div class="container">
      <h1 class="title m-b-10 animated zoomIn">
        Modest Developer
      </h1>
      <p class="animated fadeIn">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae quae minima quos qui exercitationem error, labore tempora nobis earum numquam aut, dolores odio explicabo a illo ex ea placeat inventore ad possimus tempore? Mollitia totam dolores amet enim officia veniam accusantium dolore vel soluta aperiam!</p>
      <a class="button is-light m-t-20 animated fadeIn" 
        href="{{ route('posts.index') }}"
      >Browse posts</a>
    </div>
  </div>
</section>

@endsection