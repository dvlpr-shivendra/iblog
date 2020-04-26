@if (session('success'))
<div class="notification is-success">
    <button class="delete" onclick="document.querySelector('.notification.is-success').remove()"></button>
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="notification is-error">
    <button class="delete" onclick="document.querySelector('.notification.is-error').remove()"></button>
    {{ session('error') }}
</div>
@endif