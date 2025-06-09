{{-- resources/views/livewire/vaga-card.blade.php --}}
<div class="pe-vaga-item">  {{-- container escuro, padding e borda arredondada --}}
  <h3 class="pe-vaga-titulo">{{ $vaga->titulo }}</h3>

  <div class="pe-vaga-detalhes">
    <p><strong>Descrição:</strong> {{ $vaga->descricao }}</p>
    <p><strong>Salário:</strong> R$ {{ number_format($vaga->salario,2,',','.') }}</p>
    <p><strong>Localização:</strong> {{ $vaga->localizacao }}</p>
    <p><strong>Requisitos:</strong> {{ $vaga->requisitos }}</p>
  </div>

  <div class="pe-vaga-acoes">
    @switch($context)
      @case('empresa')
        <a href="{{ route('empresa.vagas.edit', $vaga) }}"
           class="pe-vaga-btn-edit pe-btn">
          Editar
        </a>
        <form method="POST" action="{{ route('empresa.vagas.destroy', $vaga) }}">
          @csrf @method('DELETE')
          <button class="pe-vaga-btn-delete pe-btn"
                  onclick="return confirm('Remover esta vaga?')">
            Excluir
          </button>
        </form>
        @break

        @case('candidato')
        {{-- mensagem de feedback --}}
        @if($feedback)
          <div class="alert alert-info">{{ $feedback }}</div>
        @endif

        {{-- se ainda não aplicou nem rejeitou --}}
        @if(is_null($status))
          <button wire:click="candidatar" class="pe-btn pe-btn-success">Candidatar-me</button>
          <button wire:click="recusar"    class="pe-btn pe-btn-danger">Rejeitar</button>

        {{-- se já aplicou --}}
        @elseif($status === \App\Models\Candidatura::STATUS_APLICADO)
          <button wire:click="recusar" class="pe-btn pe-btn-outline-danger">
            Cancelar candidatura
          </button>

        {{-- se já rejeitou --}}
        @elseif($status === \App\Models\Candidatura::STATUS_RECUSADO)
          <button wire:click="candidatar" class="pe-btn pe-btn-outline-success">
            Candidatar novamente
          </button>
        @endif

        <a href="{{ route('empresa.perfil') }}" class="pe-btn pe-btn-primary">
          Ver Perfil
        </a>
      @break


      @case('guest')
        <a href="{{ route('login') }}" class="pe-btn pe-btn-success">Candidatar-me</a>
        <a href="{{ route('login') }}" class="pe-btn pe-btn-danger">Rejeitar</a>
        <a href="{{ route('empresa.perfil') }}" class="pe-btn pe-btn-primary">Ver Perfil</a>
        @break

      @case('empresa_publica')
        <a href="{{ route('empresa.perfil') }}" class="pe-btn pe-btn-primary">Ver Perfil</a>
        @break
    @endswitch
  </div>
</div>
