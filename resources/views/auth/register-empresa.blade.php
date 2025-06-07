<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil da Empresa | Coneccta</title>
    <link rel="stylesheet" href="{{asset('/css/perfil-empresa.css')}}">
</head>
<body>
    @livewire('nav-menu')

    <form method="POST" action="{{ route('register.empresa') }}">
  @csrf
  <input type="text" name="nome_fantasia" required>
  <input type="email" name="email" required>
  <input type="password" name="password" required>
  <input type="password" name="password_confirmation" required>
  <!-- campos de Empresa -->
  <input type="text" name="cnpj" required>
  <button type="submit">Registrar Empresa</button>
</form>

</body>
</html>