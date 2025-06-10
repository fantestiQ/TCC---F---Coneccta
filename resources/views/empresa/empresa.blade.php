<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Painel de Candidaturas</title>
  <link rel="stylesheet" href="{{ asset('/css/empresa.css') }}">
  @livewireStyles
</head>
<body class="candidatos-page">
  @livewire('nav-menu')

  <div class="container-fluid p-0">
    @livewire('swipe-applications')
  </div>

  @livewireScripts
</body>
</html>