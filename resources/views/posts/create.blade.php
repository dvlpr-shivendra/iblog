@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endPush

@section('content')

    <div class="container p-t-40 p-b-40">
        <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <label class="label">Title</label>
                <div class="control">
                    <input id="title" name="title" type="text" class="input">
                    @error('title')
                    <p class="text-red-600 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <textarea name="description" id="description" class="textarea"></textarea>
                    @error('description')
                    <p class="text-red-600 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label class="label">Body</label>
                <input id="body" type="hidden" name="body">
                <trix-editor input="body"></trix-editor>
                @error('body')
                <p class="text-red-600 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Tags</label>
                <div class="select is-multiple">
                    <select multiple size="3" name="tags[]" id="tags">
                        @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="field">
                <div class="file has-name">
                    <label class="file-label">
                        <input type="file" name="thumbnail" id="thumbnail" class="file-input">
                        <span class="file-cta">
                            <span class="file-icon">
                                <span class="material-icons">insert_photo</span>
                            </span>
                            <span class="file-label">
                                Thumbnail
                            </span>
                        </span>
                    </label>
                </div>
            </div>

            <div class="control">
                <button class="button is-primary">Submit</button>
            </div>

        </form>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>

        <script>
            Trix.config.attachments.preview.caption = { name: false, size: false }
            addEventListener("trix-attachment-add", function (event) {
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
