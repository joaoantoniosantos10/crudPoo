 <?php  ?>
<h1>Salvar produtos</h1>
<?php
################################REVISAR##########################################################
include_once("../includes.php");
    try{
        $nome = $_POST["nome"];
        $categoria_id = $_POST["id"];
 
        $produtoRepository = new ProdutoRepository();
        $cadastrar = $produtoRepository->cadastrarProdutos($nome, $categoria_id);
        echo  "<script> alert('Cadastrado com  sucesso');</script>";
        echo "<script>location.href='cadastrarProdutos.php';</script>"; 
      } catch(Exception $e){
        echo "<script> alert('Ops! Ocorreu algum erro');</script>";
        echo "<script>location.href='cadastrarProdutos.php';</script>"; 
      }
     exit();
   
?>