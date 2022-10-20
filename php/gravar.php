<?php
  
  $nome = $_POST["produto"];
  $preco = $_POST["preco"];
  $quantidade = $_POST["quantidade"];

  include "conexao.php";

  if($nome == '' && $preco == '' && $quantidade == '') {
    echo "Erro algum campo vazio";
  }else {
  mysqli_query($con, "INSERT INTO produtos(nome, preco, quantidade) VALUES ('$nome', '$preco', '$quantidade')");
  }
?>