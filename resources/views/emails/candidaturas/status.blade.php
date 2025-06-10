@component('mail::message')
# Olá, {{ $candidatura->candidato->user->name }}!

Sua candidatura à vaga **"{{ $candidatura->vaga->titulo }}"** foi **{{ $status }}**.

@if($status === 'aprovado')
Parabéns! Nossa equipe de recrutamento entrará em contato em breve com os próximos passos.
@else
Agradecemos seu interesse. Infelizmente, dessa vez não foi desta vez, mas fique atento às próximas oportunidades.
@endif



Obrigado,<br>
{{ config('app.name') }}
@endcomponent
