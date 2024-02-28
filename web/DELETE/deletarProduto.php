<?php
include_once "../includes.php";
?>
<?php

ini_set('display_errors', 1);
try{
    $id = $_GET["id"];
    $produtoRepository = new ProdutoRepository();
    $deletar = $produtoRepository->deletarProdutos($id);
    echo  "<script> alert('Editado com sucesso');</script>";
    echo "<script>location.href='../Categorias.php';</script>";
}   catch (Exception $e){
    echo  "<script> alert('Ocorreu algum  erro');</script>";
    echo "<script>location.href='../Categorias.php';</script>";
}

?>


