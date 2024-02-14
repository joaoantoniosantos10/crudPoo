<?php include_once("HTML/head.php");
include_once("REPOSITORY/estoqueRepositoryteste.php");

$nome = $_GET["nome"];
$id = $_GET["id"];
$filters = ['id' => $id, 'nome' => $nome];
$estoqueRepository = new EstoqueRepository($filters);
$filter = [];
$filters = [$id, $nome];

#verificar esse objeto
#$estoques = $estoqueRepository->getEstoques();
?>
        <div style="padding: 3em;">
   <div style="display: flex; justify-content: space-between; align-items:center; padding: 1em;">
   <h1>Estoque</h1>
</div>



 <form action="estoque.php" method="get" style="display: flex; justify-content: space-around;" id="filtro"> 

        <aside style="display:flex; flex-direction:row; gap: 10em;"> 
     <div style="display:flex; flex-direction:column;">
            <label for="id" nome>Id</label>
            <input type="text" name="id" id="">
       </div>
       <div style="display:flex; flex-direction:column;">
            <label for="nome" nome>Nome</label>
            <input type="text" name="nome" id="">
       </div>
       </aside>
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
<!-- listagem -->
        
        <?php 
        if(!empty($nome) || !empty($id)){?>
            
            <?php foreach($filtros as $filtro){ ?>
         <tbody>
            <tr>
                <td> <?php echo $filtro["id"];?></td>
                <td> <?php echo $filtro["p.nome"];?></td>
                <td> <?php echo $filtro["estoque"];?></td>
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

        <?php
         } else{?>
    <?php foreach($estoques as $estoque){ ?>
         <tbody>
            <tr>
                <td> <?php echo $estoque["id"];?></td>
                <td> <?php echo $estoque["p.nome"];?></td>
                <td> <?php echo $estoque["estoque"];?></td>
            </tr>
          </tbody>
         <?php } ?>
         </table>
         <?php
         if(empty($estoques)){?>
         <p class="alert alert-danger">Não encontrou estoque</p>
         <?php }
         exit();
            }?>

       </table>


        <?php
        if(empty($estoques)){?>
        <p class="alert alert-danger">Não encontrou estoque</p>
        <?php exit(); } ?>
        </div>
        <?php
        include_once("HTML/footer.php");
         ?>


<!--Retornar uma listagem com base-->
<?php include_once("HTML/footer.php"); ?>