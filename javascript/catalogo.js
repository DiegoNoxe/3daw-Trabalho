function alternarInteresse(botao) {
  botao.classList.toggle("interesse-ativo");
  if (botao.classList.contains("interesse-ativo")) {
    botao.textContent = "Tirar Interesse";
  } else {
    botao.textContent = "Tenho interesse";
  }
  filtrar();
}


function filtrar() {
  const filtroSelecionado = document.querySelector('input[name="filtro"]:checked').id;
  const produtos = document.querySelectorAll('.produto');

  produtos.forEach(produto => {
    const botao = produto.querySelector('.botao-interesse');
    const temInteresse = botao.classList.contains('interesse-ativo');

    if (filtroSelecionado === 'todos') {
      produto.style.display = 'flex';
    } else if (filtroSelecionado === 'interesse') {
      produto.style.display = temInteresse ? 'flex' : 'none';
    }
    });
        }

document.querySelectorAll('input[name="filtro"]').forEach(radio=>{
  radio.addEventListener('change', filtrar);
})

/*futuro script para não visualizar os produtos do proprio usuario*/