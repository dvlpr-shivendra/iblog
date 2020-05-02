@inject('markdown', 'Parsedown')
@php($markdown->setSafeMode(true))

@if(isset($reply) && $reply === true)
    <div id="comment-{{ $comment->id }}" class="media m-l-40">
        @else
            <li id="comment-{{ $comment->id }}" class="media p-15 light-border">
                @endif
                <div style="width: 100%;">
                    <figure class="image is-24x24 is-pulled-left m-r-10">
                        <img class="is-rounded" src="https://www.gravatar.com/avatar/{{ md5($comment->commenter->email ?? $comment->guest_email) }}.jpg?s=64" alt="user avatar">
                    </figure>
                    <h5 class="has-text-grey-dark">{{ $comment->commenter->name ?? $comment->guest_name }}
                        <small
                            class="has-text-grey">- {{ $comment->created_at->diffForHumans() }}
                        </small>
                    </h5>
                    <div style="white-space: pre-wrap;" class="m-t-5 m-b-5 m-l-35">{!! $markdown->line($comment->comment) !!}</div>

                    <div class="m-l-35">
                        @can('reply-to-comment', $comment)
                            <button onclick="document.querySelector('#reply-{{ $comment->id }}').classList.add('is-active')"
                                    class="button is-text">Reply
                            </button>
                        @endcan

                        @can('delete-comment', $comment)
                            <a href="{{ route('comments.destroy', $comment->id) }}"
                               onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->id }}').submit();"
                               class="is-danger is-small">
                                <span class="material-icons">delete</span>
                            </a>
                            <form id="comment-delete-form-{{ $comment->id }}"
                                  action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                  style="display: none;">
                                @method('DELETE')
                                @csrf
                            </form>
                        @endcan
                    </div>

                    @can('reply-to-comment', $comment)
                    <div class="modal" id="reply-{{ $comment->id }}">
                        <div class="modal-background"></div>
                        <div class="modal-card">
                        <form method="POST" action="{{ route('comments.reply', $comment->id) }}">
                            <header class="modal-card-head">
                              <p class="modal-card-title">Reply</p>
                              <button class="delete" aria-label="close" onclick="document.querySelector('#reply-{{ $comment->id }}').classList.remove('is-active')"></button>
                            </header>
                            <section class="modal-card-body">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea required class="textarea" name="message" rows="3"></textarea>
                                        </div>
                                    </div>
                            </section>
                            <footer class="modal-card-foot">
                                <button type="button" onclick="document.querySelector('#reply-{{ $comment->id }}').classList.remove('is-active')"
                                    class="button is-secondary">Cancel</button>
                            <button type="submit" class="button is-link">Reply</button>
                            </footer>
                        </form>
                          </div>
                      </div>
                    @endcan

                    {{-- Recursion for children --}}
                    @if($grouped_comments->has($comment->id))
                        @foreach($grouped_comments[$comment->id] as $child)
                            @include('comments::_comment', [
                                'comment' => $child,
                                'reply' => true,
                                'grouped_comments' => $grouped_comments
                            ])
                        @endforeach
                    @endif

                </div>
            @if(isset($reply) && $reply === true)
    </div>
    @else
    </li>
@endif
