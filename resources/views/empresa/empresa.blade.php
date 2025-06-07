<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coneccta</title>
    <link rel="stylesheet" href="{{asset('/css/candidatos.css')}}">
</head>
<body>
    <div>
        <img src="{{asset('images/candidatosimg.jpg')}}" class="background-image" alt="Background">
    </div>
    <!--header-->
    @livewire('nav-menu')

    <div class="sidebar">
        <h2>Vagas Abertas</h2>
        <ul>
            <li><a href="#">Desenvolvedor Frontend</a></li>
            <li><a href="#">Desenvolvedor Backend</a></li>
            <li><a href="#">Designer UX/UI</a></li>
            <li><a href="#">Gerente de Projetos</a></li>
            <li><a href="#">Analista de Dados</a></li>
            <li><a href="#">Especialista em Marketing</a></li>
            <li><a href="#">Consultor de Vendas</a></li>
            <li><a href="#">Suporte Técnico</a></li>
            <li><a href="#">Analista de Recursos Humanos</a></li>
        </ul>
    </div>



     <!--thumbnail-->
        <div class="thumbnail">
            <div class="item">
                <img src="{{asset('images/curriculomatheus.png')}}" alt="Propósito">
            </div>
        </div>
     
    
    <div id="logo-container">
        <img src="{{asset('images/logo.png')}}" id="app-logo" draggable="false">
    </div>
</body>
</html>