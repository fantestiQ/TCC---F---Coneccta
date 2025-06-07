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
        <input id="name" type="text" name="name" required>

        <label for="email">E-mail</label>
        <input id="email" type="email" name="email" required>

        <label for="password">Senha</label>
        <input id="password" type="password" name="password" required>

        <label for="password_confirmation">Confirme a Senha</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>

        <label for="cpf">CPF</label>
        <input id="cpf" type="text" name="cpf" required>

        <label for="data_nascimento">Data de Nascimento</label>
        <input id="data_nascimento" type="date" name="data_nascimento" required>

        <button type="submit" class="rf-btn-submit">Registrar Candidato</button>
      </form>
      <div class="rf-back">
        <a href="{{ route('register.choice') }}">← Voltar à Escolha de Registro</a>
      </div>
    </div>
  </main>
</body>
</html>
