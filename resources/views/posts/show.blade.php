@extends('layouts.app')

@section('content')

    <div class="columns show-post m-l-5 m-r-5 m-t-20">
        <div class="column"></div>
        <div class="column is-half">
            <h1 class="is-size-3">{{$post->title}}</h1>
            <div class="m-b-10 m-t-10">
                <figure class="image is-24x24 is-pulled-left m-r-10">
                    <img class="is-rounded" src="{{ $post->user->gravatar }}">
                </figure>
                {{$post->user->name}}
                <p class="is-pulled-right">
                    {{ $post->created_at->format('M d, Y') }}
                    &middot;
                    {{ readTime($post->body) }}
                </p>
            </div>
            <img src="{{ Storage::url($post->thumbnail) }}" alt="Post Thumbnail" class="m-b-20">
            <div class="has-text-justified">{!! $post->body !!}</div>
        </div>
        <div class="column">
            <div class="stats">
                <div>{{ $post->likes }} <span class="material-icons" data-tooltip="I like it">thumb_up</span></div>
                <div>{{ 78 }} <span class="material-icons" data-tooltip="Say something">mode_comment</span></div>
            </div>
        </div>
    </div>
@endsection
