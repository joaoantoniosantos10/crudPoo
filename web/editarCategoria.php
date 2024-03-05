<?php include_once("HTML/head.php");
include_once ("REPOSITORY/categoriaRepository.php");

?>

<form style="display: flex; justify-content: center; flex-direction:column; align-items:center; gap: 6em; "  action="editarCategoria.php" method="post">

    <h1>Cadastrar Categorias</h1>
    <div style="display: flex; justify-content:center;" class="row mb-3">
        <div class="mb-3">
            <input required type="text" class="form-control container-sm" placeholder="Categoria" name="nome"  aria-label="First name">
            <input type="hidden" name="id" value="<?php echo $id = $_GET["id"];?>">
        </div>
        <div>
            <input type="submit" class="btn btn-primary" value="Editar">
        </div>
    </div>
</form>

<?php


try{
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $categoriaRepository = new CategoriaRepository();
    $editar = $categoriaRepository->editarCategorias($nome, $id);
    echo  "<script> alert('Editado com sucesso');</script>";
    echo "<script>location.href='Categorias.php';</script>";
} catch (Exception $e){
    echo  "<script> alert('Ocorreu algum  erro');</script>";
    echo "<script>location.href='editarCategoria.php';</script>";
}

include_once("HTML/footer.php");
?>

