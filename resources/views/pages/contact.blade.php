@extends("layouts.app")

@php
    $title = "Contact me";    
@endphp

@section("content")
<div class="container m-t-20">
    <div class="card">
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">Drop an email</p>
                </div>
            </div>

            <div class="content">
                <form action="{{ route('contact') }}" method="POST">
                    @csrf
                    <div class="field">
                        <div class="field-body">
                            <div class="field">
                                <label class="label">Name
                                    <input class="input {{ $errors->has('name') ? 'is-danger' : ''}}" type="text" name="name" required>
                                </label>
                                @error('name')
                                <p class="help is-danger" id="error-name">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field">
                                <label class="label">Email
                                    <input class="input {{ $errors->has('name') ? 'is-danger' : ''}}" type="email" name="email" required>
                                </label>
                                @error('email')
                                <p class="help is-danger" id="error-email">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <label class="label">Subject
                                        <input class="input {{ $errors->has('subject') ? 'is-danger' : ''}}" type="text" name="subject" required>
                                    </label>
                                </div>
                                @error('subject')
                                <p class="help is-danger" id="error-subject">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <label class="label">Message
                                        <textarea class="textarea {{ $errors->has('message') ? 'is-danger' : ''}}" name="message" required></textarea>
                                    </label>
                                    @error('message')
                                    <p class="help is-danger" id="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <div class="field-label">
                            <!-- Left empty for spacing -->
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <button class="button is-primary">
                                        Send message
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.querySelectorAll('input, textarea').forEach(inputField => inputField.addEventListener('keyup', () => {
        {
            if (inputField.classList.contains('is-danger')) {
                inputField.classList.remove('is-danger');
                document.querySelector(`#error-${inputField.name}`).remove();
            }
        }
    }))
</script>
@endpush

@endsection