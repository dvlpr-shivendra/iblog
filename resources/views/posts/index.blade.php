@extends('layouts.app')

@section('content')
    <div class="p-t-40 container m-l-0 m-r-0">
      <div class="columns">
        <div class="column is-three-quarters">
          @forelse($posts as $post)
          <div class="box is-flex has-text-grey-light has-background-grey-dark">
              <article>
                  <div class="tags m-b-10">
                      @foreach($post->tags as $tag)
                          <span class="tag has-background-grey-darker">
                              <a href="{{route('posts.index', ['tag' => $tag->title])}}" class="has-text-white">
                                  {{ $tag->title }}
                              </a>
                          </span>
                      @endforeach
                  </div>
                  <a href="{{ $post->url() }}" class="has-text-grey">
                    <h3 class="title is-size-4 is-capitalized m-b-10 has-text-white">{{ $post->title }}</h3>
                    <div class="m-b-10">
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                        <p class="is-pulled-right">{{ readTime($post->body) }}</p>

                    </div>
                    <p class="subtitle is-size-6 has-text-grey-lighter">{{ Str::limit($post->description, 240) }}</p>
                    <div>
                        <figure class="image is-24x24 is-pulled-left m-r-10">
                            <img class="is-rounded" src="{{ $post->user->gravatar }}" alt="{{ $post->user->name }}">
                        </figure>
                        {{$post->user->name}}
                        <p class="is-pulled-right">
                            <span class="material-icons">thumb_up</span> {{ $post->likes }}
                            &middot;
                            <span class="material-icons">mode_comment</span> {{ $post->comments->count() }}
                        </p>
                    </div>
                  </a>
              </article>
          </div>
          @empty
            <h1 class="text-gray-900 font-bold text-xl mb-2">Posts are coming soon.</h1>
          @endforelse
          {{ $posts->links() }}
        </div>
        <div class="column">
          <div class="box has-text-white has-background-grey-dark" style="position: sticky; top: 100px;">
            <aside>
              <div>
                  <h1 class="is-size-4 has-text-weight-bold m-b-30">Tags <span style="width: 100%"></span></h1>
                  @foreach($tags as $tag)
                      <p class="m-b-15">
                          <a href="{{route('posts.index', ['tag' => $tag->title])}}" class="has-text-grey-light">
                              {{ $tag->title }}
                              <span class="tag is-dark is-light is-pulled-right">{{ $tag->posts->count() }}</span>
                          </a>
                      </p>
                  @endforeach
              </div>
            </aside>
          </div>
        </div>
      </div>

    </div>


@endsection
