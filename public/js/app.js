document.addEventListener("DOMContentLoaded", function() {
  // Seleciona os itens da thumbnail e os itens do carrossel
  const thumbnailItems = document.querySelectorAll(".thumbnail .item");
  const carouselItems = document.querySelectorAll(".carrossel .lista .item");
  let currentIndex = 0;
  let intervalId;

  // Remove qualquer classe active existente
  carouselItems.forEach(item => item.classList.remove("active"));

  // Ativa o primeiro item com um pequeno delay para disparar as animações
  setTimeout(() => {
    if (carouselItems[0]) {
      carouselItems[0].classList.add("active");
    }
  }, 100);

  // Função para exibir o item ativo e disparar as animações
  function showImage(index) {
    // Remove a classe active de todos os itens
    carouselItems.forEach(item => item.classList.remove("active"));
    // Adiciona a classe active ao item do índice atual
    carouselItems[index].classList.add("active");

    // Se houver thumbnails, podemos também atualizar um indicador ativo, se desejado
    thumbnailItems.forEach(item => item.classList.remove("active"));
    if (thumbnailItems[index]) {
      thumbnailItems[index].classList.add("active");
    }
  }

  // Função para iniciar o intervalo
  function startInterval() {
    intervalId = setInterval(() => {
      currentIndex++;
      if (currentIndex >= carouselItems.length) {
        currentIndex = 0; // volta para o início quando chegar ao fim
      }
      showImage(currentIndex);
    }, 10000);
  }

  // Função para reiniciar o intervalo
  function resetInterval() {
    clearInterval(intervalId);
    startInterval();
  }

  // Inicia o intervalo pela primeira vez
  startInterval();

  // Adiciona o evento de mousemove para reiniciar o intervalo
  document.addEventListener("mousemove", resetInterval);

  // Opcional: se o usuário clicar em uma thumbnail, atualiza o índice e exibe o item correspondente
  thumbnailItems.forEach((thumb, index) => {
    thumb.addEventListener("click", () => {
      currentIndex = index;
      showImage(currentIndex);
      resetInterval(); // Reinicia o intervalo quando o usuário clica em uma thumbnail
    });
  });
});














