<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Produtos', ''],
          <?php
          include "conexao.php";
          $sql = "SELECT * FROM produtos";
          $buscar = mysqli_query($con, $sql);
          while($dados = mysqli_fetch_array($buscar)){
            $nome = $dados['nome'];
            $quantidade = $dados['quantidade'];
          ?>
          ['<?php echo $nome ?>',<?php echo $quantidade ?>],
          <?php  } ?>
          ]);

        var options = {
          chart: {
            title: 'Quantidade de Produtos',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 800px; height: 800px;"></div>
    <a href="http://localhost/estagio/">Voltar</a>
  </body>
</html>
