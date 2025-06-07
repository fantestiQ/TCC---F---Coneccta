<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lista de Vagas</title>
  <style>
    /* Reset e Fontes */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: #000;
      color: #eee;
      font-family: 'Poppins', sans-serif;
      padding: 20px 1rem 40px;
      min-height: 100vh;
    }

    /* Título */
    h1 {
      text-align: center;
      color: #0dcaf0;
      font-weight: 700;
      font-size: 2.8rem;
      margin-bottom: 2rem;
      text-shadow: 0 0 10px #0dcaf0aa;
    }

    /* Container da lista */
    #lista-vagas {
      max-width: 900px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 1.6rem;
    }

    /* Card vaga */
    .vaga {
      background: rgba(30,30,30,0.85);
      padding: 1.6rem 2rem;
      border-radius: 20px;
      box-shadow: 0 8px 15px rgba(13, 202, 240, 0.3);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: default;
      animation: fadeInUp 0.6s ease forwards;
    }

    .vaga:hover {
      transform: translateY(-5px) scale(1.02);
      box-shadow: 0 15px 30px rgba(13, 202, 240, 0.6);
    }

    /* Título dentro do card */
    .vaga h3 {
      color: #0dcaf0;
      font-size: 1.6rem;
      margin-bottom: 0.4rem;
      font-weight: 700;
      user-select: none;
    }

    /* Parágrafos */
    .vaga p {
      margin: 0.25rem 0;
      color: #ccc;
      font-size: 1rem;
      line-height: 1.3;
      user-select: none;
    }

    /* Botões */
    .buttons {
      margin-top: 1rem;
    }

    .buttons button {
      background-color: #0dcaf0;
      border: none;
      color: #000;
      padding: 10px 18px;
      border-radius: 12px;
      font-weight: 600;
      cursor: pointer;
      font-size: 1rem;
      transition: background-color 0.25s ease, box-shadow 0.25s ease;
      user-select: none;
    }

    .buttons button:hover {
      background-color: #06a4bf;
      box-shadow: 0 6px 12px rgba(6, 164, 191, 0.6);
    }

    .buttons button.delete {
      background-color: #dc3545;
      color: #fff;
    }

    .buttons button.delete:hover {
      background-color: #b02839;
      box-shadow: 0 6px 12px rgba(176, 40, 57, 0.6);
    }

    /* Modal fundo */
    .modal {
      display: none;
      position: fixed;
      z-index: 9999;
      left: 0;
      top: 0;
      width: 100vw;
      height: 100vh;
      overflow-y: auto;
      background-color: rgba(0, 0, 0, 0.9);
      backdrop-filter: blur(8px);
      animation: fadeIn 0.4s ease forwards;
    }

    /* Conteúdo do modal */
    .modal-content {
      background-color: #1e1e1e;
      margin: 5% auto 5% auto;
      padding: 2rem 2.5rem;
      border-radius: 20px;
      width: 90%;
      max-width: 650px;
      color: #eee;
      box-shadow: 0 12px 30px rgba(13, 202, 240, 0.5);
      font-size: 1rem;
      line-height: 1.5;
      position: relative;
      user-select: text;
    }

    /* Título do modal */
    .modal h2 {
      color: #0dcaf0;
      font-size: 2rem;
      margin-bottom: 1rem;
      font-weight: 700;
      user-select: none;
    }

    /* Botão fechar */
    .close {
      color: #888;
      position: absolute;
      top: 15px;
      right: 25px;
      font-size: 32px;
      font-weight: 700;
      cursor: pointer;
      transition: color 0.3s ease;
      user-select: none;
    }

    .close:hover {
      color: #fff;
    }

    /* Animações */
    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(15px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    /* Responsividade */
    @media (max-width: 768px) {
      body {
        padding: 15px 1rem 30px;
      }
      
      h1 {
        font-size: 2.2rem;
        margin-bottom: 1.5rem;
      }
      
      .vaga {
        padding: 1.3rem 1.6rem;
      }
      
      .vaga h3 {
        font-size: 1.4rem;
      }
      
      .buttons button {
        padding: 8px 14px;
        font-size: 0.95rem;
      }
      
      .modal-content {
        padding: 1.5rem 1.8rem;
        font-size: 0.95rem;
      }
      
      .modal h2 {
        font-size: 1.6rem;
      }
    }

    @media (max-width: 480px) {
      .vaga {
        padding: 1rem 1.2rem;
      }
      
      .vaga h3 {
        font-size: 1.25rem;
      }
      
      .buttons button {
        padding: 7px 12px;
        font-size: 0.9rem;
      }
      
      .modal-content {
        padding: 1.2rem 1.5rem;
        font-size: 0.9rem;
      }
      
      .modal h2 {
        font-size: 1.4rem;
      }
    }
  </style>
</head>
<body>
  <h1>Lista de Vagas</h1>
  <div id="lista-vagas"></div>

  <!-- Modal -->
  <div id="modalDetalhes" class="modal">
    <div class="modal-content">
      <span class="close" onclick="fecharModal()">&times;</span>
      <div id="detalhesConteudo"></div>
    </div>
  </div>

  <script>
    let todasVagas = [];

    async function carregarVagas() {
      const res = await fetch('http:///ConecctaAPI/v1/Api.php?apicall=getVagas');
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
        const res = await fetch('http:///ConecctaAPI/v1/Api.php?apicall=excluirVaga', {
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