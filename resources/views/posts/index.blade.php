@extends('layouts.app')

@section('content')
    @forelse($posts as $post)
        <div class="flex justify-center mb-5">
            <div class="md:w-3/4">
                <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                    <div class="mb-8">
                        <div class="text-gray-900 font-bold text-xl mb-2"><a href="{{ $post->url() }}">{{ $post->title }}</a></div>
                        <p class="text-gray-700 text-base">{{ Str::limit($post->description, 240) }}</p>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10 h-10 rounded-full mr-4" src="https://via.placeholder.com/150" alt="Avatar of Jonathan Reinink">
                        <div class="text-sm">
                            <p class="text-gray-900 leading-none">{{$post->user->name}}</p>
                            <p class="text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="text-gray-900 font-bold text-xl mb-2">Nothing here.</div>
    @endforelse
@endsection
