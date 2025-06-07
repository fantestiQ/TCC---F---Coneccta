<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Candidato | Coneccta</title>
    <link rel="stylesheet" href="{{asset('/css/perfil-empresa.css')}}">
</head>
<body>
    @livewire('nav-menu')

   <form method="POST" action="{{ route('register.candidato') }}">
  @csrf
  <!-- name, email, password, password_confirmation -->
  <input type="text" name="name" required>
  <input type="email" name="email" required>
  <input type="password" name="password" required>
  <input type="password" name="password_confirmation" required>
  <!-- campos de Candidato -->
  <input type="text" name="cpf" required>
  <input type="date" name="data_nascimento" required>
  <button type="submit">Registrar Candidato</button>
</form>

</body>
</html>