@component('mail::message')

{!! $orcamento->conteudo !!}

@component('mail::button', ['url' => $orcamento->resource_url])
Acesse o Portal
@endcomponent

Atenciosamente,<br>
{{ config('app.name') }}

@endcomponent
