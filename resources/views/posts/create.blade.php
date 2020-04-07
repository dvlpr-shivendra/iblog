@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endPush

@section('content')

    <div>
        <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
            <label>
                Post Title
                <input id="title" name="title" type="text">
            </label>
            @error('title')
            <p class="text-red-600 text-xs">{{ $message }}</p>
            @enderror

            <label>
                Post Description
                <textarea name="description" id="description"></textarea>
            </label>
            @error('description')
            <p class="text-red-600 text-xs">{{ $message }}</p>
            @enderror

            <label>
                Post Body
            </label>
            <input id="body" type="hidden" name="body">
            <trix-editor input="body"></trix-editor>
            @error('body')
            <p class="text-red-600 text-xs">{{ $message }}</p>
            @enderror

            <label>
                Post Thumbnail
                <input type="file" name="thumbnail" id="thumbnail">
            </label>
            @error('thumbnail')
            <p class="text-red-600 text-xs">{{ $message }}</p>
            @enderror

            <button>Create</button>

        </form>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>

        <script>
            addEventListener("trix-attachment-add", function(event) {
                if (event.attachment.file) {
                    const formData = new FormData();
                    formData.append("image", event.attachment.file);
                    axios.post('/posts/file-upload', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }).then(function (response) {
                        event.attachment.setAttributes({
                            url: response.data
                        })
                        event.attachment.setUploadProgress(100);
                    })
                }
            })
        </script>
    @endpush
@endsection
