<?php include_once("HTML/head.php");
include_once("REPOSITORY/movimetacoesRepository.php");

try{
     $produto_id = $_POST["produto_id"];
     $qtd = $_POST["qtd"];
     $tipo = $_POST["tipo"];
     #criar e isntaciar objeto
     $movimentacoesRepository = new MovimentacoesRepository();
     $cadastrar = $movimentacoesRepository->cadastrarMovimentacoes($produto_id, $qtd, $tipo);

    echo  "<script> alert('Cadastrado com  sucesso');</script>";
    echo "<script>location.href='movimentacoes.php';</script>"; 
}catch(Exception $e){
    #echo "<script> alert('Ops! Ocorreu algum erro');</script>";
    #echo "<script>location.href='cadastrarMovimentacoes.php';</script>"; 
}


 include_once("HTML/footer.php"); 
?>