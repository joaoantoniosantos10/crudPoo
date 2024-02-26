  <?php include_once("HTML/head.php");
  include_once("REPOSITORY/categoriaRepository.php");
  $categoriaRepository = new CategoriaRepository();
  $pagina =(isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
  $id = 0;
  $categorias = $categoriaRepository->getCategorias($pagina, $id);
  $quantidade = $categoriaRepository->quantidade();
  include_once("PAGINACAO/paginacao.php");

  ?>

        <div style="padding: 3em;">
        <div style="display: flex; justify-content: space-between; align-items:center; padding: 1em;">
        <h1>Categorias</h1>
        <a href="cadastrarCategorias.php">
        <svg style="color: green;"  xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
        </svg>
         </a> </div>

    <table style="padding: 5em;" class="table">
        <thead class="table-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">nome</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>

        <?php foreach($categorias as $categoria){ ?>
        <tbody>
            <tr>
                <td> <?php echo $categoria["id"];?></td>
                <td> <?php echo $categoria["nome"];?></td>
                <td><form  action="editarCategoria.php" method="post"> <input name="id" type="hidden" value="<?php echo $categoria["id"];?>"> <input class="btn btn-success" type="submit" placeholder="Editar"></form></td>
                <td><a class="btn btn-danger" href="">Deletar</a></td>
            </tr>
        </tbody>
         <?php } ?>
       </table>
        <?php
        if(empty($categorias)){?>
        <p class="alert alert-danger">Não encontrou categorias cadastradas</p>
        <?php }
        exit();
        ?>
        </div>

        <?php
        include_once("HTML/footer.php");
         ?>
