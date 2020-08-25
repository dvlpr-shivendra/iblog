@extends('layouts.app')

@section('content')

    <section class="hero is-dark is-small is-bold">
        <div class="hero-body">
            <div class="container has-text-centered is-capitalized">
                <h1 class="is-size-2">{{ (request('tag') ?? 'All') .  ' Posts '}}</h1>
            </div>
        </div>
    </section>

    <div class="p-t-40 container m-l-0 m-r-0">
      <div class="columns">
        <div class="column is-three-quarters">
          @forelse($posts as $post)
          <div class="box is-flex is-elevated">
              <article>
                  <div class="tags m-b-10">
                      @foreach($post->tags as $tag)
                          <span class="tag has-background-grey-lighter">
                              <a href="{{route('posts.index', ['tag' => $tag->title])}}" class="has-text-dark">
                                  {{ $tag->title }}
                              </a>
                          </span>
                      @endforeach
                  </div>
                  <a href="{{ $post->url() }}" class="has-text-grey-dark">
                    <h3 class="title is-size-4 is-capitalized m-b-10 ">{{ $post->title }}</h3>
                    <div class="m-b-10">
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                        <p class="is-pulled-right">{{ readTime($post->body) }}</p>

                    </div>
                    <p class="subtitle is-size-6 has-text-grey-darker">{{ Str::limit($post->description, 240) }}</p>
                    <div>
                        <figure class="image is-24x24 is-pulled-left m-r-10">
                            <img class="is-rounded" src="{{ $post->user->gravatar }}" alt="{{ $post->user->name }}">
                        </figure>
                        {{$post->user->name}}
                        <p class="is-pulled-right">
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
          <div class="box is-elevated" style="position: sticky; top: 100px;">
            <aside>
              <div>
                  <h1 class="is-size-4 has-text-weight-bold m-b-30">Tags <span style="width: 100%"></span></h1>
                  @foreach($tags as $tag)
                      <p class="m-b-15">
                          <a href="{{route('posts.index', ['tag' => $tag->title])}}" class="has-text-grey-darker">
                              {{ $tag->title }}
                              <span class="tag is-pulled-right">{{ $tag->posts->count() }}</span>
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
