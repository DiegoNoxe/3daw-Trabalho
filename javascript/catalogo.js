function alternarInteresse(botao) {
    botao.classList.toggle("interesse-ativo");
    if (botao.classList.contains("interesse-ativo")) {
      botao.textContent = "Tirar Interesse";
    } else {
      botao.textContent = "Tenho interesse";
    }
  }
