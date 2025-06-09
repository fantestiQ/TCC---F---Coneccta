<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro de Empresa | Coneccta</title>
  
  <link rel="stylesheet" href="{{ asset('/css/perfil-empresa.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/register-form.css') }}">
</head>
<body>
  @livewire('nav-menu')

  <main class="rf-main">
    <div class="rf-card">
      <h2>Cadastro de Empresa</h2>
      <form method="POST" action="{{ route('register.empresa') }}">
        @csrf
        <label for="nome_fantasia">Nome Fantasia</label>
        <input id="nome_fantasia" type="text" name="nome_fantasia" value="{{ old('nome_fantasia') }}" class="@error('nome_fantasia') is-invalid @enderror" required>
        @error('nome_fantasia')<span class="error">{{ $message }}</span> @enderror

        <label for="email">E-mail</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror" required>
        @error('email')<span class="error">{{ $message }}</span> @enderror

        <label for="password">Senha</label>
        <input id="password" type="password" name="password" value="{{ old('password') }}" class="@error('password') is-invalid @enderror"  required>
        @error('password')<span class="error">{{ $message }}</span> @enderror

        <label for="password_confirmation">Confirme a Senha</label>
        <input id="password_confirmation" type="password" name="password_confirmation" value="{{ old('nome_fantasia') }}" class="@error('email') is-invalid @enderror" required>
        @error('password_confirmation')<span class="error">{{ $message }}</span> @enderror

        <label for="cnpj">CNPJ</label>
        <input id="cnpj" type="text" name="cnpj" value="{{ old('cnpj') }}" class="@error('cnpj') is-invalid @enderror" required>
        @error('cnpj')<span class="error">{{ $message }}</span> @enderror

        <label for="endereco">Endereço</label>
        <input id="endereco" type="string" name="endereco" value="{{ old('endereco') }}" class="@error('endereco') is-invalid @enderror" required>
        @error('endereco')<span class="error">{{ $message }}</span> @enderror

        <label for="telefone">Telefone</label>
        <input id="telefone" type="tel" name="telefone" value="{{ old('telefone') }}" class="@error('telefone') is-invalid @enderror" required>
        @error('telefone')<span class="error">{{ $message }}</span> @enderror
        
        <button type="submit" class="rf-btn-submit">Registrar Empresa</button>
      </form>
      <div class="rf-back">
        <a href="{{ route('register') }}">← Voltar à Escolha de Registro</a>
      </div>
    </div>
  </main>
</body>
</html>
