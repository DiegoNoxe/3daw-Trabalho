/* o script irá buscar o produto que contem interesse e ocultar o botaõ edição */  
  
  function filtrar() {
    const filtroSelecionado = document.querySelector('input[name="filtro"]:checked').id;
    const produtos = document.querySelectorAll('.produto');
  
    produtos.forEach(produto => {
      const interessados = parseInt(produto.getAttribute('data-interessados'));
  
      if (filtroSelecionado === 'todos') {
        produto.style.display = 'flex';
      } else if (filtroSelecionado === 'interessados') {
        produto.style.display = interessados > 0 ? 'flex' : 'none';
      }
      });
    }
  
  document.querySelectorAll('input[name="filtro"]').forEach(radio=>{
    radio.addEventListener('change', filtrar);
  })
  

  function excluir(){
/*lógica a ser implementada*/
  }


  document.querySelectorAll('.produto').forEach(produto =>{
    const interessados = parseInt(produto.dataset.interessados);
    const botaoVer = produto.querySelector('.botao-interesse');
    const botaoEditar = produto.querySelector('.editar');

    if (interessados > 0){
        botaoVer.style.display = 'inline-block';
        botaoEditar.style.display = 'none';
    }else{
        botaoVer.style.display = 'none';
        botaoEditar.style.display = 'inline-block';
    }
  })


function verInteresse(element) {
  window.location.href = "ofertas_recebidas.html";
}

function editar(element){
  window.location.href = "cadastro_produto.html";
}
