<?php include_once("HTML/head.php");
include_once("REPOSITORY/estoqueRepository.php");
$nome = $_GET["nome"];
$id = $_GET["id"];
$estoqueRepository = new EstoqueRepository();
$estoques = $estoqueRepository->getEstoques($nome,$id);
?>
        <div style="padding: 3em;">
   <div style="display: flex; justify-content: space-between; align-items:center; padding: 1em;">
   <h1>Estoque</h1>
</div>


<div class ="aside">
    <form action="estoque.php" method="get" style="display: flex; justify-content: space-around;" id="filtro">

        <div style="display:flex; flex-direction:row; gap: 10em;">
            <div style="display:flex; flex-direction:column;">
                <label for="id" >Id</label>
                <input type="number" name="id" id="id">
            </div>
            <div style="display:flex; flex-direction:column;">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">
            </div>
        </div>
        <button class="btn btn-success">Filtrar</button>
    </form>

    <table style="padding: 5em;" class="table">
        <thead class="table-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">nome</th>
            <th scope="col">estoque</th>
        </tr>
        </thead>
</div>
<!-- listagem -->
        <?php
            if(!empty($estoques)){ ?>

                <?php foreach($estoques as $estoque){ ?>
                    <tbody>
                    <tr>
                        <td> <?php echo $estoque["p.id"];?></td>
                        <td> <?php echo $estoque["p.nome"];?></td>
                        <td> <?php echo $estoque["estoque"];?></td>
                    </tr>
                    </tbody>
                <?php } ?>
                </table>

           <?php   } else{
          ?>
        <p class="alert alert-danger">Não encontrou estoque</p>
        <?php exit(); } ?>
        </div>
        <?php
        include_once("HTML/footer.php");
         ?>
