<?php
    include_once ("../index.php");
    $produtoRepository = new ProdutoRepository();
try{

    echo $id = $_POST["id"];
    echo $categoria_id = $_POST["categoria_id"];
    echo $nome = $_POST["nome"];
    $editar = $produtoRepository->editarProdutos($nome, $categoria_id, $id);
   echo  "<script> alert('Editado com sucesso');</script>";
   echo "<script>location.href='../Produtos.php';</script>";
} catch (Exception $e){
    echo $e;
    echo  "<script> alert('Ocorreu algum  erro');</script>";
   echo "<script>location.href='../EDITAR/editarProdutos.php';</script>";
}
?>