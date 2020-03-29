@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endPush

@section('content')

    <div class="flex justify-center">
        <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Post Title
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                           id="title"
                           name="title"
                           type="text"
                    >
                    @error('title')
                    <p class="text-red-600 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Post Description
                    </label>
                    <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                              name="description"
                              id="description"
                    ></textarea>
                    @error('description')
                    <p class="text-red-600 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Post Body
                    </label>
                    <input id="body" type="hidden" name="body">
                    <trix-editor input="body"></trix-editor>
                    @error('body')
                    <p class="text-red-600 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Post Thumbnail
                    </label>
                    <input type="file" name="thumbnail" id="thumbnail">
                    @error('thumbnail')
                    <p class="text-red-600 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Create
            </button>
        </form>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    @endpush
@endsection
