@extends('layouts.app')
@php
    $title = $post->title;
    $description = $post->description;
    $thumbnail = $post->thumbnail;
@endphp
@section('content')

    <button class="btn" data-clipboard-target="pre"></button>

    <div class="columns show-post m-l-5 m-r-5 m-t-20">
        <div class="column"></div>
        <div class="column is-half">
            <h1 class="is-size-3 is-capitalized">{{$post->title}}</h1>
            <div class="m-b-10 m-t-10">
                <figure class="image is-24x24 is-pulled-left m-r-10">
                    <img class="is-rounded" src="{{ $post->user->gravatar }}" alt="{{ $post->user->name }}">
                </figure>
                {{$post->user->name}}
                <p class="is-pulled-right">
                    {{ $post->created_at->format('M d, Y') }}
                    &middot;
                    {{ readTime($post->body) }}
                </p>
            </div>
            <img src="{{ Storage::url($post->thumbnail) }}" alt="Post Thumbnail" class="m-b-10">
            <div class="has-text-justified">{!! $post->body !!}</div>
        </div>
        <div class="column">
            <div class="stats is-hidden">
                <div class="likes" data-post="{{ $post->slug }}">
                    <span class="material-icons thumb" data-tooltip="I like it">thumb_up</span>
                    <span id="likes-counter">{{ $post->likes }}</span>
                </div>
                <div class="comments">
                    <a href="#comments">
                        <span class="material-icons" data-tooltip="Say something">mode_comment</span>
                    </a>
                    <span>{{ $post->approvedComments->count() }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="columns show-post m-l-5 m-r-5 m-t-20">
        <div class="column"></div>
        <div class="column is-half">
            <div class="m-t-20">
                <h3 class="m-b-20 m-t-20 is-size-4">Comments ({{ $post->approvedComments->count() }})</h3>
                @comments(['model' => $post, 'approved' => true])
            </div>
        </div>
        <div class="column"></div>
    </div>

    @push('scripts')
    <script>

        if (localStorage.getItem("{{ $post->slug }}")) {
            document.querySelector(".thumb").classList.add("has-text-danger")
        }


        document.querySelector(".likes").addEventListener("click", (event) => {
            
            const post = document.querySelector(".likes").dataset.post;
            
            if (!localStorage.getItem(post)) {
                const likesCounter = document.querySelector("#likes-counter");
                axios.post(`/posts/${post}/like`, {}).then(response => {
                    likesCounter.innerText = response.data;
                    localStorage.setItem(post, true);
                    document.querySelector(".thumb").classList.add("has-text-danger")
                })
            }
            
        });

        const stats = document.querySelector('.stats');
        window.addEventListener('scroll', function(e) {
            if (window.scrollY > (window.innerHeight / 3)) {
                if (stats.classList.contains('is-hidden')) {
                    stats.classList.remove('is-hidden');
                    stats.classList.add('animated');
                    stats.classList.add('fadeIn');
                }
            } else {
                stats.classList.add('is-hidden');
            }
        })
    </script>
    @endpush
@endsection
