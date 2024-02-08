<?php  

include_once("Repositorys/UsuarioRepository.php");

try {
    $id = $_GET["id"];

    echo 'id: ' . $id;
    echo "<br>";

    $usuarioRepository = new UsuarioRepository();
    $usuarioRepository->deletarUsuarios($id);   
    echo  "<script> alert('Editado com sucesso');</script>";
    echo "<script>location.href='?page=listar';</script>"; 
}catch(Exception $e) {
    echo "<script> alert('Ops! Ocorreu algum erro');</script>";
    echo "<script>location.href='?page=listar';</script>";
}

?>