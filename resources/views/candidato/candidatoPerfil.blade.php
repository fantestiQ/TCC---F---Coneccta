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

   
        <!-- Conteúdo do Perfil -->
        <div class="pe-content-container">
            <!-- Seção de Dados da Empresa -->
            <div class="pe-perfil">
                <div class="pe-header">
                    <img src="{{ asset('images/empresa-logo.png') }}" class="pe-company-logo" alt="Logo da Empresa">
                    <div class="pe-info">
                        <h2>Candidato nome</h2>
                        <p><strong>CPF:</strong> 12.345.678/0001-99</p>
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
                <div class="pe-vagas-lista">
                    <!-- Vaga 1 -->
                    <div class="pe-vaga-item">
                        <h3 class="pe-vaga-titulo">Currículo</h3>
                        <div class="pe-vaga-acoes">
                            <button class="pe-vaga-btn pe-vaga-btn-edit">Carregar Currículo</button>
                            <button class="pe-vaga-btn pe-vaga-btn-edit">Ver Currículo</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
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
</body>
</html>