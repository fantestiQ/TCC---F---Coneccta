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
                              <div id="lista-vagas"></div>

                                <!-- Modal -->
                                <div id="modalDetalhes" class="modal">
                                    <div class="modal-content">
                                    <span class="close" onclick="fecharModal()">&times;</span>
                                    <div id="detalhesConteudo"></div>
                                    </div>
                                </div>
                            <div class="vaga-linha">
                               
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

    <script>
    let todasVagas = [];

    async function carregarVagas() {
      const res = await fetch('http://192.168.77.104/ConecctaAPI/v1/Api.php?apicall=getVagas');
      const data = await res.json();

      const container = document.getElementById('lista-vagas');
      container.innerHTML = '';
      todasVagas = data.vagas;

      if (data.count === 0) {
        container.innerHTML = '<p>Nenhuma vaga encontrada.</p>';
        return;
      }

      data.vagas.forEach(vaga => {
        const div = document.createElement('div');
        div.className = 'vaga';

        div.innerHTML = `
          <h3>${vaga.titulo_vagas}</h3>
          <p><strong>Local:</strong> ${vaga.local_vagas}</p>
          <p><strong>Empresa:</strong> ${vaga.nome_empresa}</p>
          <div class="buttons">
            <button onclick="verDetalhes(${vaga.id_vagas})">Ver Detalhes</button>
            <button class="delete" onclick="excluirVaga(${vaga.id_vagas})">Excluir</button>
          </div>
        `;

        container.appendChild(div);
      });
    }

    function verDetalhes(id) {
      const vaga = todasVagas.find(v => v.id_vagas == id);
      if (!vaga) return alert('Vaga não encontrada');

      const detalhes = `
        <h2>${vaga.titulo_vagas}</h2>
        <p><strong>Empresa:</strong> ${vaga.nome_empresa}</p>
        <p><strong>Local:</strong> ${vaga.local_vagas}</p>
        <p><strong>Descrição:</strong> ${vaga.descricao_vagas}</p>
        <p><strong>Requisitos:</strong> ${vaga.requisitos_vagas}</p>
        <p><strong>Salário:</strong> ${vaga.salario_vagas}</p>
        <p><strong>Vínculo:</strong> ${vaga.vinculo_vagas}</p>
        <p><strong>Ramo:</strong> ${vaga.ramo_vagas}</p>
        <p><strong>Benefícios:</strong> ${vaga.beneficios_vagas}</p>
        <p><strong>Nível de experiência:</strong> ${vaga.nivel_experiencia}</p>
        <p><strong>Tipo de contrato:</strong> ${vaga.tipo_contrato}</p>
        <p><strong>Área de atuação:</strong> ${vaga.area_atuacao}</p>
        <p><strong>Habilidades desejáveis:</strong> ${vaga.habilidades_desejaveis}</p>
        <p><strong>Website:</strong> ${vaga.website_empresa}</p>
        <p><strong>Email:</strong> ${vaga.email_empresa}</p>
        <p><strong>CNPJ:</strong> ${vaga.cnpj_empresa}</p>
      `;

      document.getElementById('detalhesConteudo').innerHTML = detalhes;
      document.getElementById('modalDetalhes').style.display = 'block';
    }

    function fecharModal() {
      document.getElementById('modalDetalhes').style.display = 'none';
    }

    async function excluirVaga(id) {
      if (!confirm('Tem certeza que deseja excluir esta vaga?')) return;

      const formData = new FormData();
      formData.append('id_vaga', id);

      try {
        const res = await fetch('http://192.168.77.104/ConecctaAPI/v1/Api.php?apicall=excluirVaga', {
          method: 'POST',
          body: formData
        });

        const data = await res.json();

        if (data.error === false) {
          alert('Vaga excluída com sucesso.');
          carregarVagas();
        } else {
          alert('Erro ao excluir vaga: ' + data.message);
        }
      } catch (err) {
        alert('Erro na requisição: ' + err.message);
      }
    }

    window.onload = carregarVagas;

    // Fechar modal ao clicar fora
    window.onclick = function(event) {
      const modal = document.getElementById('modalDetalhes');
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
</body>
</html>