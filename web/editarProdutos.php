
<?php include_once("HTML/head.php");
include_once ("REPOSITORY/produtoRepository.php");
include_once("REPOSITORY/categoriaRepository.php");
$categoriaRepository = new CategoriaRepository();
$pagina =0;
$categorias = $categoriaRepository->getCategorias($pagina);
?>

<?php if(!empty($categorias)){ ?>

    <form style="padding: 4em;" action="SALVAR/salvarProdutos.php" method="POST">

        <div class="row mb-3">

            <select class="form-select mb-3" aria-label="Default select example" name="categoria_id">
                <option selected>Seleciona a categoria</option>
                <?php foreach($categorias as $categoria){?>
                    <option value="<?php echo $categoria['id']?>"> <?php echo $categoria['nome'];?></option>
                <?php }?>
            </select>
            <div>
                <input name="nome"  type="text" class="form-control mb-3" placeholder="Nome do produto" aria-label="First name"></div>
                 <input name ="id" type="hidden" value="<?php $id = $_GET["id"];?>" >
        </div>

        <button class="btn btn-primary" type="submit">Enviar</button>
    </form>

<?php }else{?>
    <p class='alert alert-danger'> Não encontrou resultados</p>
<?php }?>


<?php
try{
    $id = $_POST["id"];
    $categoria = $_POST["categoria_id"];
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

