<?php
    include_once "../includes.php";
    #ini_set('display_errors', 1);
    try{
    $id = $_GET["id"];
    $categoriaRepository = new CategoriaRepository();
    $deletar = $categoriaRepository->deletarCategorias($id);
    echo  "<script> alert('Editado com sucesso');</script>";
    echo "<script>location.href='../Categorias.php';</script>";
    } catch (Exception $e){
        echo $e->getMessage();
        exit;
    echo  "<script> alert('Ocorreu algum  erro');</script>";
    echo "<script>location.href='../Categorias.php';</script>";
    }



