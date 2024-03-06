<?php

include_once("../includes.php");
$movimentacoes = new MovimentacoesRepository();

try{
    $id = $_POST["id"];
    $produto_id = $_POST["produto_id"];
    $qtd = $_POST["qtd"];
    $tipo = $_POST["tipo"];
    $editar = $movimentacoes->editarMovimentacoes($id, $tipo, $produto_id, $qtd);
    echo  "<script> alert('Editado com sucesso');</script>";
    echo "<script>location.href='../movimentacoes.php';</script>";
} catch(Exception $e){
    echo $e;
   echo "<script> alert('Ops! Ocorreu algum erro');</script>";
   echo "<script>location.href='../editarMovimentacoes.php';</script>";
}


?>