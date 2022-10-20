<?php
  $id = $_POST["id_produto"];

  include "conexao.php";

  if($id == '') {
    echo "Erro algum campo vazio";
  }else {
  mysqli_query($con, "DELETE FROM produtos WHERE id_produto = $id");
  }
?>