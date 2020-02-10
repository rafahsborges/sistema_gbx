@component('mail::message')

{!! $notification->conteudo !!}

@component('mail::button', ['url' => $notification->resource_url])
Acesse o Portal
@endcomponent

Atenciosamente,<br>
{{ config('app.name') }}

@endcomponent
