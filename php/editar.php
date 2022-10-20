<?php
  $id = $_POST["id_produto"];
  $nome = $_POST["produto"];
  $preco = $_POST["preco"];
  $quantidade = $_POST["quantidade"];

  include "conexao.php";
  if($id == '') {
    echo "Erro algum campo vazio";
  }
  if($preco == '' && $quantidade == ''){
    mysqli_query($con, "UPDATE produtos SET nome = '$nome' WHERE (id_produto = '$id')");
  }elseif($nome == '' && $quantidade == ''){
    mysqli_query($con, "UPDATE produtos SET preco = '$preco' WHERE (id_produto = '$id')");
  }elseif($nome == '' && $preco == ''){
    mysqli_query($con, "UPDATE produtos SET quantidade = '$quantidade' WHERE (id_produto = '$id')");
  }
 
?>