<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Escolha de Registro | Coneccta</title>

  <!-- CSS base do projeto -->
  <link rel="stylesheet" href="{{ asset('/css/perfil-empresa.css') }}">
  <!-- Novo CSS específico desta página -->
  <link rel="stylesheet" href="{{ asset('/css/register-choice.css') }}">
</head>
<body>
  @livewire('nav-menu')

  <main class="rc-main">
    <div class="rc-card">
      <h2>Como deseja se registrar?</h2>

      <div class="rc-buttons">
        <a href="{{ route('register.candidato.form') }}" class="rc-btn-candidato">
          Candidato
        </a>
        <a href="{{ route('register.empresa.form') }}" class="rc-btn-empresa">
          Empresa
        </a>
      </div>

      <div class="rc-back">
        <a href="{{ route('login') }}">← Voltar para Login</a>
      </div>
    </div>
  </main>
</body>
</html>
