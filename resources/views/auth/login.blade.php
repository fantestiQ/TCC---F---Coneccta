<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Coneccta')</title>

  <!-- seu CSS e Livewire -->
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  @livewireStyles

</head>
<body>

  @livewire('nav-menu')

    <div class="login-wrapper">
        <img src="{{ asset('/images/loginimg.png')}}" alt="Background" class="background-image">
      @livewire('auth.login')
    </div>

  @livewireScripts

</body>
</html>
