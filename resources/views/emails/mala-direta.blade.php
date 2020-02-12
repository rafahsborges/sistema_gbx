@component('mail::message')

{!! $malaDireta->conteudo !!}

@component('mail::button', ['url' => $malaDireta->resource_url])
Acesse o Portal
@endcomponent

Atenciosamente,<br>
{{ config('app.name') }}

@endcomponent
