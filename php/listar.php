<?php
  include "conexao.php";

  $query = "SELECT * FROM produtos";
  $registros = mysqli_query($con, $query);

  $i = 0;

  while($registro = mysqli_fetch_assoc($registros)) {
    $resposta[$i]["id_produto"] = $registro["id_produto"];
    $resposta[$i]["nome"] = $registro["nome"];
    $resposta[$i]["preco"] = $registro["preco"];
    $resposta[$i]["quantidade"] = $registro["quantidade"];
    $i++;
  }

  $objetoJSON = json_encode($resposta);
  echo $objetoJSON;
?>