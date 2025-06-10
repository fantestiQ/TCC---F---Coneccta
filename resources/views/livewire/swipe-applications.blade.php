<div class="candidatos-main">
  {{-- SIDEBAR --}}
  <aside class="candidatos-sidebar">
    <h2>Vagas Criadas</h2>
    <ul class="list-group">
      @foreach($vagas as $vaga)
        <li wire:click="selectVaga({{ $vaga->id }})"
            class="list-group-item {{ $selectedVagaId == $vaga->id ? 'active' : '' }}">
          {{ $vaga->titulo }}
        </li>
      @endforeach
    </ul>
  </aside>

  {{-- ÁREA DE SWIPE --}}
  <section class="candidatos-swipe">
    <div class="swipe-wrapper">

      @if ($applications->isEmpty())
        <p class="text-center text-muted">
          {{ session('message') ?? 'Nenhuma candidatura pendente para esta vaga.' }}
        </p>
      @else
        @php $c = $applications->get($currentIndex); @endphp

        @if ($c)
          <div class="card mb-4">
            <div class="card-body d-flex flex-column">

              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">{{ $c->candidato->user->name }}</h5>

                @if ($c->candidato->resume_path)
                  <a href="{{ route('empresa.candidatura.curriculo', $c->id) }}"
                     target="_blank"
                     class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-external-link-alt"></i> Ver Currículo Completo
                  </a>
                @endif
              </div>

              {{-- Visualização do currículo --}}
              @if ($c->candidato->resume_path)
                <div class="flex-grow-1 mb-3 position-relative"
                     style="height:65vh; background:#f8f9fa; border-radius:8px; overflow:hidden;">
                  <iframe
                    src="{{ route('empresa.candidatura.curriculo', $c->id) }}#zoom=FitH"
                    style="width:100%; height:100%; border:none;"
                    loading="lazy"></iframe>
                  <div class="iframe-overlay"></div>
                </div>
              @else
                <div class="flex-grow-1 d-flex align-items-center justify-content-center mb-3"
                     style="height:65vh; background:#f8f9fa; border-radius:8px;">
                  <p class="text-muted">Nenhum currículo disponível.</p>
                </div>
              @endif

              <div class="mt-auto d-flex justify-content-between gap-3">

                {{-- Botão Recusar --}}
                <button
                  wire:click="swipeLeft"
                  wire:loading.attr="disabled"
                  wire:loading.class="btn-secondary"
                  wire:target="swipeLeft"
                  class="btn btn-outline-danger flex-grow-1 py-2">
                  <i class="fas fa-times"></i>
                  Recusar
                </button>

                {{-- Botão Aprovar --}}
                <button
                  wire:click="swipeRight"
                  wire:loading.attr="disabled"
                  wire:loading.class="btn-secondary"
                  wire:target="swipeRight"
                  class="btn btn-outline-success flex-grow-1 py-2">
                  <i class="fas fa-check"></i>
                  Aprovar
                </button>

              </div>

              {{-- Loading indicator --}}
              <div wire:loading wire:target="swipeLeft,swipeRight"
                   class="mt-2 text-center text-sm text-gray-500">
                📤 Enviando e-mail ao candidato...
              </div>

            </div>
          </div>
        @endif
      @endif

    </div>
  </section>
</div>