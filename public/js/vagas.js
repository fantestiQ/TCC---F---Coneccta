// Dados das vagas
const vagas = {
    1: { titulo: "Desenvolvedor Front-end", descricao: "Procuramos um desenvolvedor front-end com experiência em React e Vue.js para trabalhar em projetos inovadores." },
    2: { titulo: "Desenvolvedor Back-end", descricao: "Vaga para desenvolvedor back-end com conhecimentos em Node.js, Python e bancos de dados relacionais." },
    3: { titulo: "UX/UI Designer", descricao: "Designer criativo para desenvolver interfaces intuitivas e experiências de usuário excepcionais." },
    4: { titulo: "Analista de Dados", descricao: "Profissional para análise de dados e criação de relatórios estratégicos para a empresa." },
    5: { titulo: "Gerente de Projetos", descricao: "Coordene equipes e garanta a entrega de projetos dentro do prazo e orçamento." },
    6: { titulo: "Especialista em Marketing", descricao: "Crie e implemente estratégias de marketing digital para aumentar nossa presença online." }
};

// Estado da aplicação
const estadoApp = {
    vagasEnviadas: new Set(),
    vagasRejeitadas: new Set()
};

// Função para mostrar detalhes da vaga
function mostrarVaga(id, elemento) {
    const vaga = vagas[id];
    if (!vaga) return;

    // Atualiza conteúdo principal
    document.getElementById('vaga-titulo').textContent = vaga.titulo;
    document.getElementById('vaga-descricao').textContent = vaga.descricao;

    // Remove classe active de todas as vagas
    document.querySelectorAll('.vaga-item').forEach(item => {
        item.classList.remove('active');
    });

    // Adiciona classe active apenas na vaga clicada (se não estiver rejeitada/enviada)
    if (!estadoApp.vagasEnviadas.has(id) && !estadoApp.vagasRejeitadas.has(id)) {
        elemento.classList.add('active');
    }
}

// Função para enviar currículo
function enviarCurriculo(vagaId, elemento) {
    if (estadoApp.vagasEnviadas.has(vagaId)) {
        alert('Você já enviou currículo para esta vaga!');
        return;
    }

    if (confirm(`Enviar currículo para ${vagas[vagaId].titulo}?`)) {
        // Atualiza estado
        estadoApp.vagasEnviadas.add(vagaId);
        
        // Atualiza UI
        elemento.closest('.vaga-item').classList.add('curriculo-enviado');
        elemento.closest('.vaga-item').classList.remove('active');
        elemento.disabled = true;
        
        // Desabilita o botão de rejeitar também
        const btnRejeitar = elemento.closest('.botoes-vaga').querySelector('.btn-rejeitar');
        btnRejeitar.disabled = true;
        
        // Aqui você faria a requisição AJAX para o servidor
        console.log(`Currículo enviado para vaga ${vagaId}`);
        alert('Currículo enviado com sucesso!');
        
        // Opcional: Salva no localStorage
        localStorage.setItem('estadoVagas', JSON.stringify({
            enviadas: Array.from(estadoApp.vagasEnviadas),
            rejeitadas: Array.from(estadoApp.vagasRejeitadas)
        }));
    }
}

// Função para rejeitar vaga
function rejeitarVaga(vagaId, elemento) {
    if (confirm(`Rejeitar a vaga ${vagas[vagaId].titulo}?`)) {
        // Atualiza estado
        estadoApp.vagasRejeitadas.add(vagaId);
        
        // Atualiza UI
        const vagaItem = elemento.closest('.vaga-item');
        vagaItem.classList.add('vaga-rejeitada');
        vagaItem.classList.remove('active');
        
        // Desabilita ambos botões
        const botoes = vagaItem.querySelectorAll('button');
        botoes.forEach(btn => btn.disabled = true);
        
        alert('Vaga rejeitada com sucesso!');
        
        // Opcional: Salva no localStorage
        localStorage.setItem('estadoVagas', JSON.stringify({
            enviadas: Array.from(estadoApp.vagasEnviadas),
            rejeitadas: Array.from(estadoApp.vagasRejeitadas)
        }));
    }
}

// Inicialização da aplicação
document.addEventListener("DOMContentLoaded", function() {
    // Carrega estado salvo (se existir)
    const estadoSalvo = localStorage.getItem('estadoVagas');
    if (estadoSalvo) {
        const { enviadas, rejeitadas } = JSON.parse(estadoSalvo);
        enviadas.forEach(id => estadoApp.vagasEnviadas.add(id));
        rejeitadas.forEach(id => estadoApp.vagasRejeitadas.add(id));
        
        // Aplica estados na UI
        estadoApp.vagasEnviadas.forEach(id => {
            const vagaItem = document.querySelector(`.vaga-item[data-id="${id}"]`);
            if (vagaItem) {
                vagaItem.classList.add('curriculo-enviado');
                const botoes = vagaItem.querySelectorAll('button');
                botoes.forEach(btn => btn.disabled = true);
            }
        });
        
        estadoApp.vagasRejeitadas.forEach(id => {
            const vagaItem = document.querySelector(`.vaga-item[data-id="${id}"]`);
            if (vagaItem) {
                vagaItem.classList.add('vaga-rejeitada');
                const botoes = vagaItem.querySelectorAll('button');
                botoes.forEach(btn => btn.disabled = true);
            }
        });
    }

    // Configura eventos de clique nas vagas
    document.querySelectorAll('.vaga-item').forEach(item => {
        item.addEventListener('click', function(e) {
            // Não faz nada se clicar diretamente nos botões
            if (e.target.tagName === 'BUTTON') return;
            
            const id = this.getAttribute('data-id');
            mostrarVaga(parseInt(id), this);
        });
    });

    // Configura eventos dos botões
    document.querySelectorAll('.btn-enviar').forEach(btn => {
        btn.addEventListener('click', function() {
            const vagaId = this.getAttribute('data-vaga');
            enviarCurriculo(vagaId, this);
        });
    });

    document.querySelectorAll('.btn-rejeitar').forEach(btn => {
        btn.addEventListener('click', function() {
            const vagaId = this.getAttribute('data-vaga');
            rejeitarVaga(vagaId, this);
        });
    });

    // Ativa o primeiro item do carrossel
    document.querySelector('.carrossel .lista .item').classList.add('active');
});