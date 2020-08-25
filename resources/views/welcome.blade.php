@extends('layouts.app')

@section('content')

@php $post = \App\Post::latest()->first() @endphp

<section class="hero is-link is-fullheight-with-navbar">
  <div class="hero-body animated fadeIn">
    <div class="container">
      <div class="columns">
        <div class="column">
          <h1 class="title m-b-25">Blog For LAMP Stack Developers</h1>
          <p class="animated fadeIn is-size-5">Linux Apache, Nginx, MySQL, PHP, Laravel, JavaScript, VueJS, CSS and much more.</p>
          <a class="button is-light m-t-25 has-text-weight-bold" href="{{ route('posts.index') }}">Browse Post</a>
          <a class="button is-light is-outlined m-t-25" href="{{ url('pages/contact') }}">Contact Me</a>
        </div>
        <div class="column is-hidden-touch">
          <img src="/images/code.svg" alt="Art">
        </div>
      </div>
    </div>
  </div>
</section>

@endsection