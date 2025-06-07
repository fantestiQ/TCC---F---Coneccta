<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha de Registro | Coneccta</title>
    <link rel="stylesheet" href="{{asset('/css/perfil-empresa.css')}}">
</head>
<body>
    @livewire('nav-menu')

    <div class="container text-center mt-5">
  <h2>Como deseja se registrar?</h2>
  <div class="mt-4">
    <a href="{{ route('register.candidato.form') }}" class="btn btn-primary mx-2">
      Candidato
    </a>
    <a href="{{ route('register.empresa.form') }}" class="btn btn-secondary mx-2">
      Empresa
    </a>
  </div>
</div>
</body>
</html>