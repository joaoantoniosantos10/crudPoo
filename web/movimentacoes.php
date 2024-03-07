<?php
  include_once("HTML/head.php");
  include_once("REPOSITORY/movimetacoesRepository.php");
  include_once("REPOSITORY/produtoRepository.php");
  $produtoRepository = new ProdutoRepository();
  $movimentacoesRepository = new MovimentacoesRepository();
  $id = $_GET["id"];
  $nome = $_GET["nome"];
  $pagina =(isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
  $movimentacoes = $movimentacoesRepository->getMovimentacoes($pagina, $nome, $id);
   $quantidade = $movimentacoesRepository->quantidade();
  include_once("PAGINACAO/paginacao.php");

  include_once("")
?>

<div style="padding: 3em;">
<hr style="color: white;">
<div style="display: flex; justify-content: space-between; align-items:center; padding: 1em;">
    <h1>Movimentações</h1>
<a href="cadastrarMovimentacao.php">
    <svg style="color: green;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
    </svg>
  </a>
</div>
<hr>

    <div>
        <div style="padding: 2em" class ="aside">
            <form action="movimentacoes.php" method="get" style="display: flex; justify-content: space-around;" id="filtro">

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
                <button class="btn btn-success">Filtrar</button></div>


        <table class="table" style="padding: 5em;">
   <thead class="table-light">
    <tr>
     <th class="col">#</th>
       <th class="col">produto</th>
       <th class="col">qtd</th>
       <th class="col">tipo</th>
        <th class="col"></th>
        <th class="col"></th>
      </tr>
    </thead>

  <?php foreach($movimentacoes as $movimentacao){?>
      <?php if(empty($movimentacao["deletado"])){  ?>

          <tbody>
      <tr>
        <td> <?php echo $movimentacao["id"];?></td>
        <td> <?php
               $movimentacao["produto_id"];
               $produtos = $produtoRepository->getProduto($movimentacao["produto_id"]);
               echo $produtos["nome"];
            ?></td>
        <td> <?php echo $movimentacao["qtd"];?></td>
        <td>    <?php if($movimentacao["tipo"] == 1){?>
          <span class="badge bg-success">Entrada</span>
        <?php } else{?> 
          <span class="badge bg-danger">Saida</span>
          <?php }?> </td>
          <td>
              <a href="editarMovimentacoes.php?id=<?php echo $movimentacao["id"]; ?>" class="btn btn-success">Editar</a>
          </td>
          <td>
              <a href="DELETE/deletarMovimentacao.php?id=<?php echo $movimentacao["id"]; ?>" class="btn btn-danger">Deletar</a>
          </td>
      </tr>
         <?php } ?>
   </tbody>
   <?php }?>
  </table>
  <?php
  if(empty($movimentacoes)){?>
  <p class="alert alert-danger"> Não encontrou categorias cadastradas</p>
  <?php }
  exit(); ?> 
</div>
<?php include_once("HTML/footer.php"); ?>
