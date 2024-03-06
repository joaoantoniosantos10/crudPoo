<?php
    include_once ("../includes.php");

 try{

     $id = $_GET["id"];
     $movimentacoesRepository = new MovimentacoesRepository();
     $deletar = $movimentacoesRepository->deletarMovimentacoes($id);
     echo  "<script> alert('Deletado com sucesso');</script>";
     echo "<script>location.href='../movimentacoes.php';</script>";
     }catch (Exception $e){
     echo  "<script> alert('Ocorreu algum  erro');</script>";
     echo "<script>location.href='../movimentacoes.php';</script>";
 }