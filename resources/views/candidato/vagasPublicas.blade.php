<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coneccta</title>
    <link rel="stylesheet" href="{{asset('/css/vagas.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/vagasPublicas.css') }}">
    @livewireStyles
</head>
<body>
    <!--header-->
    @livewire('nav-menu')

    <div class="pe-main-container">
        <div class="pe-content-container">
            <div class="pe-perfil">
                <div class="pe-info">
                    <h1>Vagas Disponíveis</h1>
                    <div class="pe-description">
                        <p>Encontre as melhores oportunidades para sua carreira</p>
                    </div>
                </div>
            </div>

            <div class="pe-vagas-section">
                <div class="pe-vagas-lista">
                    @foreach($vagas as $vaga)
                        @livewire('vaga-card', ['vaga' => $vaga, 'context' => 'guest'], key('guest-'.$vaga->id))
                    @endforeach
                </div>
            </div>

            <div class="pe-pagination">
                {{ $vagas->links() }}
            </div>
        </div>
    </div>

    @livewireScripts
</body>
</html>