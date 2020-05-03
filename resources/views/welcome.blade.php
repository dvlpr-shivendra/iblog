@extends('layouts.app')

@section('content')

<section class="hero is-link is-fullheight-with-navbar">
    <div class="hero-body">
      <div class="container">
        <h1 class="title m-b-10 animated pulse">
          CoderProphet
        </h1>
        <p class="animated slideInLeft">CoderProphet brought programming and technology guide for you. Take your skills to the next level with me on Programmning, Linux, Technology and so much more.</p>
        <a class="button is-light m-t-20 animated fadeIn" href="{{ route('posts.index') }}">Browse posts</a>
      </div>
    </div>
  </section>

@endsection
