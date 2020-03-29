@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="md:w-1/2">
            <h1 class="capitalize text-4xl">{{$post->title}}</h1>
            <div class="flex justify-between my-4 items-center">
                <div class="flex items-center">
                    <img class="w-12 h-12 rounded-full mr-2" src="https://via.placeholder.com/200" alt="Avatar of Jonathan Reinink">
                    <p class="font-medium">
                        {{ $post->user->name }} <br>
                        <span class="font-light text-gray-600 text-sm">{{ $post->created_at->format('M d, Y') }}</span>
                    </p>
                </div>
                <p class="text-gray-600">{{ readTime($post->body) }}</p>
            </div>
            <img src="{{ Storage::url($post->thumbnail) }}" alt="" class="rounded">
            <div class="text-justify">
                {!! $post->body !!}
            </div>
        </div>
    </div>
@endsection
