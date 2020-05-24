@extends('layouts.app')

@section('content')
<div class="container m-t-20">
    <article class="box has-text-grey-light has-background-grey-dark is-flex error">
        <h3 class="title is-size-4 is-capitalized has-text-white m-b-40">404 - Not Found</h3>
        <p class="subtitle is-size-6 has-text-grey-lighter">You have landed in the middle of nowehere.</p>
        <a class="button is-light animated fadeIn" href="{{ route('posts.index') }}">Take me home</a>
    </article>
</div>
@endsection