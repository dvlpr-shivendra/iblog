@component('mail::message')
# Introduction

{{ $data['message'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

{{ $data['name'] }},<br>
{{ $data['email'] }},<br>
{{ config('app.name') }}
@endcomponent