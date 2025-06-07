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
        <input id="nome_fantasia" type="text" name="nome_fantasia" required>

        <label for="email">E-mail</label>
        <input id="email" type="email" name="email" required>

        <label for="password">Senha</label>
        <input id="password" type="password" name="password" required>

        <label for="password_confirmation">Confirme a Senha</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>

        <label for="cnpj">CNPJ</label>
        <input id="cnpj" type="text" name="cnpj" required>

        
        <button type="submit" class="rf-btn-submit">Registrar Empresa</button>
      </form>
      <div class="rf-back">
        <a href="{{ route('register.choice') }}">← Voltar à Escolha de Registro</a>
      </div>
    </div>
  </main>
</body>
</html>
