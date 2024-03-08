<?php

include_once("../index.php");
$movimentacoes = new MovimentacoesRepository();

try{
  echo  $id = $_POST["id"];
  echo  $produto_id = $_POST["produto_id"];
  echo  $qtd = $_POST["qtd"];
  echo  $tipo = $_POST["tipo"];
    $editar = $movimentacoes->editarMovimentacoes($id, $tipo, $produto_id, $qtd);
    echo  "<script> alert('Editado com sucesso');</script>";
    echo "<script>location.href='../movimentacoes.php';</script>";
} catch(Exception $e){
    echo $e;
  echo "<script> alert('Ops! Ocorreu algum erro');</script>";
  echo "<script>location.href='../editarMovimentacoes.php';</script>";
}


?>