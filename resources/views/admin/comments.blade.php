@extends('layouts.app')

@section('content')
    @forelse ($comments as $comment)
    <div class="box">
        <article class="media">
          <div class="media-left">
            <figure class="image is-64x64">
              <img src="https://www.gravatar.com/avatar/{{ md5($comment->commenter->email ?? $comment->guest_email) }}.jpg" alt="Image">
            </figure>
          </div>
          <div class="media-content">
            <div class="content">
              <p>
                <strong>{{ $comment->commenter->name ?? $comment->guest_name }}</strong> <small>{{ $comment->created_at->diffForHumans() }}</small>
                <br>
                {{ $comment->comment }}
              </p>
              <p>
                  <a href="/admin/approve-comment/{{ $comment->id }}" class="button is-primary">Approve</a>
                  <a href="/admin/trash-comment/{{ $comment->id }}" class="button is-link">Trash</a>
              </p>
            </div>
          </div>
        </article>
      </div>
    @empty
        <p>No new comments now.</p>
    @endforelse
@endsection