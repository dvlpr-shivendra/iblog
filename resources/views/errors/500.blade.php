@extends('layouts.app')

@section('content')
<div class="container m-t-20">
    <article class="box has-text-grey-light has-background-grey-dark is-flex error">
        <h3 class="title is-size-4 is-capitalized has-text-white m-b-40">500 - Something went wrong</h3>
        <p class="subtitle is-size-6 has-text-grey-lighter">Something went wrong whiler processing your request.</p>
        <a class="button is-light animated fadeIn" href="{{ route('posts.index') }}">Take me back</a>
    </article>
</div>
@endsection