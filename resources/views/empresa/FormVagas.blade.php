<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Criar Nova Vaga | Coneccta</title>

  <!-- CSS Base (nav, reset, etc) -->
  <link rel="stylesheet" href="{{ asset('css/perfil-empresa.css') }}">
  <!-- CSS específico deste form -->
  <link rel="stylesheet" href="{{ asset('css/createVagas.css') }}">
  @livewireStyles
</head>
<body>
  @livewire('nav-menu')

  <main class="main-content cv-main">
    <div class="cv-card">
      <h2>Criar Nova Vaga</h2>

      @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
      @endif

      <form action="{{ route('empresa.vagas.store') }}" method="POST">
        @csrf
        <div class="input-box">
          <input type="text" name="titulo"
                 class="input-field" placeholder="Título da vaga"
                 value="{{ old('titulo') }}" required>
          @error('titulo') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="input-box">
          <textarea name="descricao" class="input-field" placeholder="Descrição da vaga" rows="4" required>{{ old('descricao') }}</textarea>
          @error('descricao') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="input-box">
          <input type="text" name="escolaridade"
                 class="input-field" placeholder="Escolaridade"
                 value="{{ old('escolaridade') }}">
          @error('escolaridade') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="input-box">
          <input type="number" name="salario" step="0.01"
                 class="input-field" placeholder="Salário (R$)"
                 value="{{ old('salario') }}">
          @error('salario') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="input-box">
          <input type="text" name="localizacao"
                 class="input-field" placeholder="Localização"
                 value="{{ old('localizacao') }}">
          @error('localizacao') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="submit-btn">Criar Vaga</button>
      </form>

      <div class="sign-up-link">
        <a href="{{ route('empresa.vagas.index') }}">← Voltar para o Perfil</a>
      </div>
    </div>
  </main>

  <script src="{{ asset('js/app.js') }}"></script>
  @livewireScripts
</body>
</html>
