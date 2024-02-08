<h1>Aqui é aonde salva</h1>

<?php
    include_once("Repositorys/UsuarioRepository.php");
    $nome  = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $nascimento =  $_POST["data_nasc"];
    $id = $_POST["id"];
    #COMENTAR E VER UMA FORMA DPO PARA ANALISAR
    #chamar, repassar e funcionar;
    $usuarioRepository = new UsuarioRepository();
    $recadastrar = $usuarioRepository->editarUsuarios($nome, $email, $senha, $nascimento, $id);

    if($recadastrar){
     echo  "<script> alert('Editado com sucesso');</script>";
     echo "<script>location.href='?page=listar';</script>"; 
    }else{
        echo "<script> alert('Ops! Ocorreu algum erro');</script>";
        echo "<script>location.href='?page=listar';</script>";
    }
    echo "<pre>";
    
     exit();

    
?>