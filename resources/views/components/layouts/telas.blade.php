<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Coneccta')</title>

  <!-- seu CSS e Livewire -->
    <link rel="stylesheet"  href="{{asset('/css/int.css')}}">
  @livewireStyles

  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.9/dist/cdn.min.js"></script>
</head>
<body>

  {{-- navegação centralizada aqui --}}
 @livewire('nav-menu')
  {{-- conteúdo específico de cada página --}}
  <main>
    @yield('content')
  </main>

  <!-- seus scripts e Livewire -->
  <script src="{{ asset('js/app.js') }}"></script>
  @livewireScripts

</body>
</html>