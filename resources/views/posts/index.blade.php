@extends('layouts.app')

@section('content')
    <div class="m-t-40 m-l-20 m-r-20">
      <div class="columns">
        <div class="column is-three-quarters">
          @forelse($posts as $post)
          <div class="box is-flex p-30 m-b-20" style="border: 1px solid #eee">
              <article>
                  <div class="tags m-b-10">
                      <span class="tag is-info">Laravel</span>
                      <span class="tag is-info">PHP</span>
                      <span class="tag is-info">MySQL</span>
                  </div>
                  <h3 class="title is-size-4 is-capitalized m-b-10">
                      <a class="has-text-dark" href="{{ $post->url() }}">{{ $post->title }}</a>
                  </h3>
                  <div class="m-b-10">
                      <span>{{ $post->created_at->diffForHumans() }}</span>
                      <p class="is-pulled-right">{{ readTime($post->body) }}</p>
                      
                  </div>
                  <p class="subtitle is-size-6">{{ Str::limit($post->description, 240) }}</p>
                  <div>
                      <figure class="image is-24x24 is-pulled-left m-r-10">
                          <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
                      </figure>
                      {{$post->user->name}}
                      <p class="is-pulled-right">
                          3 <span class="material-icons">favorite_border</span>
                          &middot;
                          39 <span class="material-icons">comment</span>
                      </p>
                  </div>
              </article>
          </div>
          @empty
            <h1 class="text-gray-900 font-bold text-xl mb-2">Posts are coming soon.</h1>
          @endforelse
          {{ $posts->links() }}
        </div>
        <div class="column">
          <div class="box" style="position: sticky; top: 100px; border: 1px solid #eee">
            <aside>
              <div>
                <p class="m-b-75"><strong>Post By Tags</strong></p>
                <p class=m-b-15 >Laravel <span class="tag is-info is-light">10</span></p>
                <p class=m-b-15>PHP <span class="tag is-info is-light">103</span></p>
                <p class=m-b-15>MySQL <span class="tag is-info is-light">310</span></p>
                <p class=m-b-15>Apache <span class="tag is-info is-light">140</span></p>
                <p class=m-b-15>Debian <span class="tag is-info is-light">210</span></p>
                <p class=m-b-15>Fedora <span class="tag is-info is-light">105</span></p>
              </div>
            </aside>
          </div>
        </div>
      </div>
      
    </div>

    
@endsection
