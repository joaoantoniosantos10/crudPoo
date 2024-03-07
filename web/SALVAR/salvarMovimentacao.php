<?php
include_once("../includes.php");
try{
     $produto_id = $_POST["produto_id"];
     $qtd = $_POST["qtd"];
     $tipo = $_POST["tipo"];
     $movimentacoesRepository = new MovimentacoesRepository();
     $cadastrar = $movimentacoesRepository->cadastrarMovimentacoes($produto_id, $qtd, $tipo);
    #echo  "<script> alert('Cadastrado com  sucesso');</script>";
   # echo "<script>location.href='../movimentacoes.php';</script>";
    }catch(Exception $e){
    #echo "<script> alert('Ops! Ocorreu algum erro');</script>";
   # echo "<script>location.href='../cadastrarMovimentacoes.php';</script>";
    }
