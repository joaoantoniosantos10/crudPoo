<?php include_once("HTML/head.php");
include_once("REPOSITORY/estoqueRepository.php");
$estoqueRepository = new EstoqueRepository();
$estoques = $estoqueRepository->getEstoques();
?>
        <div style="padding: 3em;">
   <div style="display: flex; justify-content: space-between; align-items:center; padding: 1em;">
   <h1>Estoque</h1>
    <a href="cadastrarCategorias.php">
    </div>

    <table style="padding: 5em;" class="table">
        <thead class="table-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">nome</th>
                <th scope="col">entradas</th>
                <th scope="col">saidas</th>

            </tr>
        </thead>

        <?php foreach($estoques as $estoque){ ?>
        <tbody>
            <tr>
                <td> <?php echo $estoque["id"];?></td>
                <td> <?php echo $estoque["p.nome"];?></td>
                <td> <?php echo $estoque["entradas"];?></td>
                <td> <?php echo $estoque["saidas"];?></td>
           
            </tr>
        </tbody>
         <?php } ?>
       </table>
        <?php
        if(empty($estoques)){?>
        <p class="alert alert-danger">Não encontrou estoque</p>
        <?php }
        exit();
        ?>

        </div>

        <?php
        include_once("HTML/footer.php");
         ?>


<!--Retornar uma listagem com base-->
<?php include_once("HTML/footer.php"); ?>
