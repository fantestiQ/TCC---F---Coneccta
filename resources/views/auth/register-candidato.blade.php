<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro de Candidato | Coneccta</title>
  
  <link rel="stylesheet" href="{{ asset('/css/perfil-empresa.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/register-form.css') }}">
</head>
<body>
  @livewire('nav-menu')

  <main class="rf-main">
    <div class="rf-card">
      <h2>Cadastro de Candidato</h2>
      <form method="POST" action="{{ route('register.candidato') }}">
        @csrf
        <label for="name">Nome Completo</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror" required>
        @error('name')<span class="error">{{ $message }}</span> @enderror
        
        <label for="email">E-mail</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror" required>
        @error('email')<span class="error">{{ $message }}</span> @enderror

        <label for="password">Senha</label>
        <input id="password" type="password" name="password" value="{{ old('password') }}" class="@error('password') is-invalid @enderror" required>
        @error('password')<span class="error">{{ $message }}</span> @enderror

        <label for="password_confirmation">Confirme a Senha</label>
        <input id="password_confirmation" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="@error('password_confirmation') is-invalid @enderror" required>
        @error('password_confirmation')<span class="error">{{ $message }}</span> @enderror

        <label for="cpf">CPF</label>
        <input id="cpf" type="text" name="cpf" value="{{ old('cpf') }}" class="@error('cpf') is-invalid @enderror" required>
        @error('cpf')<span class="error">{{ $message }}</span> @enderror

        <label for="data_nascimento">Data de Nascimento</label>
        <input id="data_nascimento" type="date" name="data_nascimento" value="{{ old('data_nascimento') }}" class="@error('data_nascimento') is-invalid @enderror" required>
        @error('data_nascimento')<span class="error">{{ $message }}</span> @enderror

        <label for="endereco">Endereço</label>
        <input id="endereco" type="string" name="endereco" value="{{ old('endereco') }}" class="@error('endereco') is-invalid @enderror" required>
        @error('endereco')<span class="error">{{ $message }}</span> @enderror

        <label for="telefone">Telefone</label>
        <input id="telefone" type="tel" name="telefone" value="{{ old('telefone') }}" class="@error('telefone') is-invalid @enderror" required>
        @error('telefone')<span class="error">{{ $message }}</span> @enderror

        <button type="submit" class="rf-btn-submit">Registrar Candidato</button>
      </form>
      <div class="rf-back">
        <a href="{{ route('register') }}">← Voltar à Escolha de Registro</a>
      </div>
    </div>
  </main>
</body>
</html>
