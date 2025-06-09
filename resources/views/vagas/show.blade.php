<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil da Empresa | Coneccta</title>
    <link rel="stylesheet" href="{{asset('/css/perfil-empresa.css')}}">
    <link rel="stylesheet" href="{{asset('/css/cards.css')}}">
    @livewireStyles
</head>
<body>


    @livewire('nav-menu')

<div class="pe-main-container">
  <div class="pe-content-container">

    {{-- Seção de Vaga Detalhada --}}
    <div class="pe-vagas-section">
      <div class="pe-vagas-header">
        <h2>Detalhes da Vaga</h2>
        {{-- Se quiser um botão de voltar, por ex: --}}
        <a href="{{ route('empresa.perfil') }}" class="pe-btn pe-btn-primary">← Voltar</a>
      </div>

      <div class="pe-vaga-item">
        <h3 class="pe-vaga-titulo">{{ $vaga->titulo }}</h3>

        <div class="pe-vaga-detalhes">
          <p><strong>Descrição:</strong> {{ $vaga->descricao }}</p>
          <p><strong>Salário:</strong> R$ {{ number_format($vaga->salario, 2, ',', '.') }}</p>
          <p><strong>Localização:</strong> {{ $vaga->localizacao }}</p>
          <p><strong>Requisitos:</strong> {{ $vaga->requisitos }}</p>
        </div>

        <div class="pe-vaga-acoes">
          @guest
            <a href="{{ route('login') }}" class="pe-btn pe-btn-success">Candidatar-me</a>
            <a href="{{ route('login') }}" class="pe-btn pe-btn-danger">Rejeitar</a>
          @else
            @if(auth()->user()->role === 'candidato')
              <form action="{{ route('candidato.vagas.candidatar', $vaga) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="pe-btn pe-btn-success">Candidatar-me</button>
              </form>
              <form action="{{ route('candidato.vagas.recusar', $vaga) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="pe-btn pe-btn-danger">Rejeitar</button>
              </form>
            @elseif(auth()->user()->role === 'empresa')
              <a href="{{ route('empresa.vagas.edit', $vaga) }}" class="pe-btn pe-vaga-btn-edit">Editar</a>
              <form action="{{ route('empresa.vagas.destroy', $vaga) }}" method="POST" class="inline">
                @csrf @method('DELETE')
                <button class="pe-btn pe-vaga-btn-delete">Excluir</button>
              </form>
            @endif
          @endguest

          {{-- Sempre disponível --}}
          <a href="{{ route('empresa.perfil') }}" class="pe-btn pe-btn-primary">
            Ver Perfil da Empresa
          </a>
        </div>
      </div>
    </div>

  </div>
</div>


    @livewireScripts
</body>
</html>