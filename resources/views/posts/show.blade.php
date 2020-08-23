@extends('layouts.app')

@section('content')
<section class="hero is-dark is-medium is-bold">
    <div class="hero-body">
        <div class="container has-text-centered is-capitalized">
            <h1 class="is-size-2">{{ $post->title }}</h1>
        </div>
    </div>
</section>

<div class="container">
    <div class="column is-8 is-offset-2">
        <div class="card article">
            <div class="card-content">
                <div class="media">
                    <div class="media-content has-text-centered">
                        <div class="tags has-addons level-item">
                            <span class="tag is-rounded is-primary">Shivendra TechSter</span>
                            <span class="tag is-rounded">{{ $post->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                    <div class="content article-body">{!! $post->body !!}</div>
                    <h3 class="m-b-20 m-t-20 is-size-4">Comments ({{ $post->approvedComments->count() }})</h3>
                    @comments(['model' => $post, 'approved' => true])
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
