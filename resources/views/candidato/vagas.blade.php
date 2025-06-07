<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coneccta</title>
    <link rel="stylesheet" href="{{asset('/css/vagas.css')}}">
</head>
<body>
    <!--header-->
 @livewire('nav-menu')

    <!--Container-->
    <div class="container">
        <!-- carrossel -->
        <div class="carrossel">
            <!--lista-->
            <div class="lista">
                <div class="item active">
                    <img src="{{ asset('images/fuji.png') }}" draggable="false">
                    <div class="conteudo">
                        <div class="titulo" id="vaga-titulo">Bem-vindo Candidato!</div>
                        <div class="descricao" id="vaga-descricao">
                            Aqui terá acesso a grandes oportunidades!
                        </div>
                        <!-- Lista de vagas -->
                        <div class="vagas-container">
                            <div class="vaga-linha">
                                <!-- Vaga 1 -->
                                <div class="vaga-item" data-id="1">
                                    <div class="vaga-conteudo">
                                        <h3>Vaga 1</h3>
                                        <p>Desenvolvedor Front-end</p>
                                        <div class="botoes-vaga">
                                            <button class="btn-enviar" data-vaga="1">Enviar Currículo</button>
                                            <button class="btn-rejeitar" data-vaga="1">Rejeitar Vaga</button>
                                        </div>
                                    </div>
                                    <div class="vaga-seta">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                                
                                <!-- Vaga 2 -->
                                <div class="vaga-item" data-id="2">
                                    <div class="vaga-conteudo">
                                        <h3>Vaga 2</h3>
                                        <p>Desenvolvedor Back-end</p>
                                        <div class="botoes-vaga">
                                            <button class="btn-enviar" data-vaga="2">Enviar Currículo</button>
                                            <button class="btn-rejeitar" data-vaga="2">Rejeitar Vaga</button>
                                        </div>
                                    </div>
                                    <div class="vaga-seta">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                                
                                <!-- Vaga 3 -->
                                <div class="vaga-item" data-id="3">
                                    <div class="vaga-conteudo">
                                        <h3>Vaga 3</h3>
                                        <p>UX/UI Designer</p>
                                        <div class="botoes-vaga">
                                            <button class="btn-enviar" data-vaga="3">Enviar Currículo</button>
                                            <button class="btn-rejeitar" data-vaga="3">Rejeitar Vaga</button>
                                        </div>
                                    </div>
                                    <div class="vaga-seta">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="vaga-linha">
                                <!-- Vaga 4 -->
                                <div class="vaga-item" data-id="4">
                                    <div class="vaga-conteudo">
                                        <h3>Vaga 4</h3>
                                        <p>Analista de Dados</p>
                                        <div class="botoes-vaga">
                                            <button class="btn-enviar" data-vaga="4">Enviar Currículo</button>
                                            <button class="btn-rejeitar" data-vaga="4">Rejeitar Vaga</button>
                                        </div>
                                    </div>
                                    <div class="vaga-seta">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                                
                                <!-- Vaga 5 -->
                                <div class="vaga-item" data-id="5">
                                    <div class="vaga-conteudo">
                                        <h3>Vaga 5</h3>
                                        <p>Gerente de Projetos</p>
                                        <div class="botoes-vaga">
                                            <button class="btn-enviar" data-vaga="5">Enviar Currículo</button>
                                            <button class="btn-rejeitar" data-vaga="5">Rejeitar Vaga</button>
                                        </div>
                                    </div>
                                    <div class="vaga-seta">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                                
                                <!-- Vaga 6 -->
                                <div class="vaga-item" data-id="6">
                                    <div class="vaga-conteudo">
                                        <h3>Vaga 6</h3>
                                        <p>Especialista em Marketing</p>
                                        <div class="botoes-vaga">
                                            <button class="btn-enviar" data-vaga="6">Enviar Currículo</button>
                                            <button class="btn-rejeitar" data-vaga="6">Rejeitar Vaga</button>
                                        </div>
                                    </div>
                                    <div class="vaga-seta">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="logo-container">
            <img src="{{ asset('images/logo.png') }}" id="app-logo" draggable="false">
        </div>
    </div>

    <script src="{{asset('/js/vagas.js')}}" defer></script>
</body>
</html>