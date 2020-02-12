@component('mail::message')
Prezado {{$orcamento->nome}},

{!! $orcamento->conteudo !!}

@php

$images = $orcamento->getMedia('gallery');
$pdfs = $orcamento->getMedia('pdf');

@endphp

@if($images || $pds)
Anexos:<br>

@if($images)

@foreach($images as $image)
<a href="{{ url($image->getUrl()) }}">
Imagem
</a>
<br>
@endforeach

@endif

@if($pdfs)

@foreach($pdfs as $pdf)
<a href="{{ url($pdf->getUrl()) }}">
PDF
</a>
<br>
@endforeach

@endif

@endif

Atenciosamente,<br>
{{ config('app.name') }}

@endcomponent
