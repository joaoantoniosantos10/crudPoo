
<?php 
    include_once "Repositorys/UsuarioRepository.php";
    #puxando o post
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $nascimento = $_POST["data_nasc"];
    #chamar classe
    $usuarioRepository = new UsuarioRepository();
    #criar outra variavel que vai chamar o objeto que por sua vez puxa uma função já repasando alguns parametros;
    $cadastrar = $usuarioRepository->cadastrarUsuarios($nome, $email, $senha, $nascimento);
    #isso
    echo "<pre>";
    if($cadastrar){
        echo  "<script> alert('Editado com sucesso');</script>";
        echo "<script>location.href='?page=listar';</script>"; 
       }else{
           echo "<script> alert('Ops! Ocorreu algum erro');</script>";
           echo "<script>location.href='?page=listar';</script>";
       }
       echo "<pre>";
       
        exit();
    var_dump($cadastrar);
    exit();
?>
