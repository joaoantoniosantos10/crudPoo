<?php include_once("../head.php");
include_once("../index.php");
      $categoriaRepository = new CategoriaRepository();
    $pagina =0;
    $categorias = $categoriaRepository->forProduct();
?>

<?php if(!empty($categorias)){ ?>

  <form style="padding: 4em;" action="../SALVAR/salvarProdutos.php" method="POST">

<div class="row mb-3">

<select class="form-select mb-3" aria-label="Default select example" name="id">
  <option selected>Seleciona a categoria</option>
  <?php foreach($categorias as $categoria){?>
    <option value="<?php echo $categoria['id']?>"> <?php echo $categoria['nome'];?></option>
    <?php }?>
</select>
   <div>
   <input name="nome"  type="text" class="form-control mb-3" placeholder="Nome do produto" aria-label="First name"></div>
  </div>
      
      <button class="btn btn-primary" type="submit">Enviar</button>
  </form>

  <?php }else{?>
  <p class='alert alert-danger'> Não encontrou resultados</p>
  <?php }?>
<?php include_once("../footer.php");
exit();?>
