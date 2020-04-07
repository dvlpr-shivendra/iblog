@extends('layouts.app')

@section('content')
    <h1>{{$post->title}}</h1>
    <img src="https://via.placeholder.com/200" alt="Avatar of Jonathan Reinink">
    <p>{{ $post->user->name }}</p>
    <p>{{ $post->created_at->format('M d, Y') }}</p>
    <p>{{ readTime($post->body) }}</p>
    <img src="{{ Storage::url($post->thumbnail) }}" alt="Post Thumbnail">
    <div class="text-justify">{!! $post->body !!}</div>
@endsection
