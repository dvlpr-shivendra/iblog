@extends('layouts.app')

@section('content')

<section class="hero is-link is-fullheight-with-navbar">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          Blog for developers
        </h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, esse? Inventore quis sint, excepturi nobis nam aliquid maxime porro, numquam, repudiandae corporis vero beatae quod laboriosam laudantium natus recusandae repellendus.</p>
        <a class="button is-primary m-t-10" href="{{ route('posts.index') }}">Show posts</a>
      </div>
    </div>
  </section>

@endsection
