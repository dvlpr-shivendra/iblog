@extends('layouts.app')

@section('content')

    <div class="columns show-post m-l-5 m-r-5 m-t-20">
        <div class="column"></div>
        <div class="column is-half">
            <h1 class="is-size-3">{{$post->title}}</h1>
            <div class="m-b-10 m-t-10">
                <figure class="image is-24x24 is-pulled-left m-r-10">
                    <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
                </figure>
                {{$post->user->name}}
                <p class="is-pulled-right">
                    {{ $post->created_at->format('M d, Y') }}
                    &middot;
                    {{ readTime($post->body) }}
                </p>
            </div>
            <img src="{{ Storage::url($post->thumbnail) }}" alt="Post Thumbnail">
            <div class="has-text-justified">{!! $post->body !!}</div>
        </div>
        <div class="column">
            <div class="stats">
                {{ $post->likes }} <span class="material-icons">favorite_border</span>&nbsp;
                {{ 78 }} <span class="material-icons">message</span>
            </div>
        </div>
    </div>
@endsection
