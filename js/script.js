//Grafico
google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          
          ['Produtos', 'Quantidade'],
          ["Macarrão", 44],
          ["Feijão", 31],
          ["Arroz", 12],
          ["Laranja", 10],
          ['Uva', 3]
        ]);

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'Quantidade de Produtos',
            subtitle: 'Quantidade' },
          axes: {
            x: {
              0: { side: 'top', label: 'Produtos'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };


//Criar Produto no Banco de dados
function criarProduto() {
  var elementoForm = document.getElementById("criarProduto");

  var dados = new FormData(elementoForm);

  fetch("./php/gravar.php", {
    method: "POST",
    body: dados,
  });
}

//Excluir Produto no Banco de dados
function excluir(){
  var elementoForm = document.getElementById("excluirProduto");

  var dados = new FormData(elementoForm);

  fetch("./php/excluir.php", {
    method: "POST",
    body: dados,
  });
}

// Editar Produto no Banco de dados
function editar(){
  var elementoForm = document.getElementById("editaProduto");

  var dados = new FormData(elementoForm);

  fetch("./php/editar.php", {
    method: "POST",
    body: dados,
  });
}


fetch("./php/listar.php", {
  method: "GET",
}).then(async function (resposta) {
  var objeto = await resposta.json();
  listarProdutos(objeto);
});

function listarProdutos(produtos) {
  for (var i = 0; i < produtos.length; i++) {
    var conteudo = "";
    conteudo += '<div class="lista-produto">';
    conteudo += "<h2>Produtos Adicionados</h2>";
    conteudo += '<div class="id">';
    conteudo += '<p> ID do Produto ' + produtos[i].id_produto + '</p>';
    conteudo += '</div>';
    conteudo += '<div class="card">';
    conteudo += '<img src="imagem/nome.png" width="50px" height="50px">';
    conteudo += '<div class="frase">';
    conteudo += produtos[i].nome;
    conteudo += "</div>";
    conteudo += "</div>";
    conteudo += '<div class="card">';
    conteudo += '<img src="imagem/valor.png" width="50px" height="50px">';
    conteudo += '<div class="frase">';
    conteudo += produtos[i].preco;
    conteudo += "</div>";
    conteudo += "</div>";
    conteudo += '<div class="card">';
    conteudo += '<img src="imagem/descricao.png" width="50px" height="50px">';
    conteudo += '<div class="frase">';
    conteudo += produtos[i].quantidade;
    conteudo += "</div>";
    conteudo += "</div>";
    conteudo += '</div>';
    conteudo += "</div>";

    document.getElementById("produtos").innerHTML += conteudo;
  }
}
