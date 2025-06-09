<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil da Empresa | Coneccta</title>
    <link rel="stylesheet" href="{{asset('/css/perfil-empresa.css')}}">
    <link rel="stylesheet" href="{{asset('/css/cards.css')}}">
    @livewireStyles
</head>
<body>


    @livewire('nav-menu')

   
        <!-- Conteúdo do Perfil -->
        <div class="pe-content-container">
            <!-- Seção de Dados da Empresa -->
            <div class="pe-perfil">
                <div class="pe-header">
                    <img src="{{ asset('images/empresa-logo.png') }}" class="pe-company-logo" alt="Logo da Empresa">
                    <div class="pe-info">
                        <h2>TechSolutions Ltda.</h2>
                        <p><strong>CNPJ:</strong> 12.345.678/0001-99</p>
                        <p><strong>E-mail:</strong> contato@techsolutions.com</p>
                        <p><strong>Telefone:</strong> (11) 98765-4321</p>
                        <p><strong>Endereço:</strong> Rua das Inovações, 123 - São Paulo/SP</p>
                        <button class="pe-btn pe-btn-primary">Editar Perfil</button>
                        <button class="pe-btn pe-btn-danger">Excluir Conta</button>
                    </div>
                </div>
                <div class="pe-description">
                    <h3>Sobre Nós</h3>
                    <p>Empresa especializada em desenvolvimento de software e soluções tecnológicas, com mais de 10 anos de mercado e uma equipe de profissionais altamente qualificados. Nosso objetivo é transformar ideias em soluções digitais inovadoras que impulsionam os negócios de nossos clientes.</p>
                </div>
            </div>

            <!-- Seção de Vagas -->
            <div class="pe-vagas-section">
                <div class="pe-vagas-header">
                    <h2 class="pe-vagas-title">Vagas Publicadas</h2>  <a href="{{ route('empresa.vagas.create') }}" class="pe-btn pe-btn-success">Criar Nova Vaga</a> 
                </div>
            </div>
             @foreach(auth()->user()->empresa->vagas as $vaga)
                 @livewire('vaga-card', ['vaga' => $vaga, 'context' => 'empresa'], key('empresa-'.$vaga->id) )
            @endforeach
        </div>
    </div>

    <script>
        // Scripts específicos podem ser adicionados aqui
        document.addEventListener('DOMContentLoaded', function() {
            // Exemplo de interação
            document.querySelectorAll('.pe-vaga-item').forEach(item => {
                item.addEventListener('click', function(e) {
                    if (!e.target.classList.contains('pe-vaga-btn')) {
                        this.querySelector('.pe-vaga-detalhes').classList.toggle('active');
                    }
                });
            });
        });
    </script>
    @livewireScripts
</body>
</html>