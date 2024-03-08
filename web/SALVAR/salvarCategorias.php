<h1>Salvar categorias</h1>
<?php
    include_once("../index.php");

    try{
       $nome = $_POST["nome"];
       $categoriaRepository = new CategoriaRepository();
       $cadastrar = $categoriaRepository->cadastrarCategorias($nome);
       echo  "<script> alert('Cadastrado com  sucesso');</script>";
       echo "<script>location.href='../Categorias.php';</script>";
     } catch(Exception $e){
       echo "<script> alert('Ops! Ocorreu algum erro');</script>";
       echo "<script>location.href='../SALVAR/cadastrarCategorias.php';</script>";
     }
    exit();
?>
