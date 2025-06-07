<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Coneccta')</title>

  <!-- seu CSS e Livewire -->
  <link rel="stylesheet" href="{{ asset('css/createVagas.css') }}">
  @livewireStyles

  <!-- Alpine.js -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.9/dist/cdn.min.js"></script>
</head>
<body>
  @livewire('nav-menu')

    <div class="pe-main-container">
        <div class="max-w-lg mx-auto mt-8">

            <h2 class="text-2xl font-semibold mb-4">Criar Nova Vaga</h2>

            {{-- Exibe mensagem de sucesso, se existir --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="login-box">
                <form action="{{ route('empresa.vagas.store') }}" method="POST">
                    @csrf

                    {{-- TÍTULO --}}
                    <div class="input-box">
                        <input 
                            type="text" 
                            name="titulo" 
                            class="input-field" 
                            placeholder="Título da vaga"
                            value="{{ old('titulo') }}" 
                            autocomplete="off"
                            required
                        >
                        @error('titulo') 
                            <span class="error">{{ $message }}</span> 
                        @enderror
                    </div>

                    {{-- DESCRIÇÃO --}}
                    <div class="input-box">
                        <textarea 
                            name="descricao" 
                            class="input-field" 
                            placeholder="Descrição da vaga"
                            rows="4"
                            required
                        >{{ old('descricao') }}</textarea>
                        @error('descricao') 
                            <span class="error">{{ $message }}</span> 
                        @enderror
                    </div>

                    {{-- ESCOLARIDADE --}}
                    <div class="input-box">
                        <input 
                            type="text" 
                            name="escolaridade" 
                            class="input-field" 
                            placeholder="Escolaridade"
                            value="{{ old('escolaridade') }}"
                            autocomplete="off"
                        >
                        @error('escolaridade') 
                            <span class="error">{{ $message }}</span> 
                        @enderror
                    </div>

                    {{-- SALÁRIO --}}
                    <div class="input-box">
                        <input 
                            type="number" 
                            name="salario" 
                            class="input-field" 
                            placeholder="Salário (R$)"
                            step="0.01"
                            value="{{ old('salario') }}"
                        >
                        @error('salario') 
                            <span class="error">{{ $message }}</span> 
                        @enderror
                    </div>

                    {{-- LOCALIZAÇÃO --}}
                    <div class="input-box">
                        <input 
                            type="text" 
                            name="localizacao" 
                            class="input-field" 
                            placeholder="Localização"
                            value="{{ old('localizacao') }}"
                            autocomplete="off"
                        >
                        @error('localizacao') 
                            <span class="error">{{ $message }}</span> 
                        @enderror
                    </div>

                    {{-- BOTÃO DE ENVIO --}}
                    <button type="submit" class="submit-btn">
                        Criar Vaga
                    </button>
                </form>

                <div class="sign-up-link mt-4">
                    <a href="{{ route('empresa.vagas.index') }}">← Voltar para o Perfil </a>
                </div>
            </div>
        </div>
    </div>
  <!-- seus scripts e Livewire -->
  <script src="{{ asset('js/app.js') }}"></script>
  @livewireScripts

</body>
</html>
