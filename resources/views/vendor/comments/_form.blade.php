<div class="m-t-50">
    @if($errors->has('commentable_type'))
        <div class="alert alert-danger" role="alert">
            {{ $errors->first('commentable_type') }}
        </div>
    @endif
    @if($errors->has('commentable_id'))
        <div class="alert alert-danger" role="alert">
            {{ $errors->first('commentable_id') }}
        </div>
    @endif
    
    <form method="POST" action="{{ route('comments.store') }}">
        @csrf
        @honeypot
        <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
        <input type="hidden" name="commentable_id" value="{{ $model->id }}" />

        {{-- Guest commenting --}}
        @if(isset($guest_commenting) and $guest_commenting == true)
            <div class="field">
                <label for="message">Name</label>
                <input type="text" class="input @if($errors->has('guest_name')) is-danger @endif" name="guest_name" />
                @error('guest_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="field">
                <label for="message">Email</label>
                <input type="email" class="input @if($errors->has('guest_email')) is-danger @endif" name="guest_email" />
                @error('guest_email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        @endif

        <div class="field">
            <label for="message">Comment</label>
                <textarea class="textarea @if($errors->has('message')) is-danger @endif" name="message" rows="3"></textarea>
{{--            <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small>--}}
        </div>
        <button class="button is-primary m-t-5">Comment</button>
    </form>
</div>
<br />
