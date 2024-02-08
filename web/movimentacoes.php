<?php
  include_once("HTML/head.php");
  include_once("REPOSITORY/movimetacoesRepository.php");
  $movimentacoesRepository = new MovimentacoesRepository();
  $movimentacoes = $movimentacoesRepository->getMovimentacoes();
?>

<div style="padding: 3em;">
<hr style="color: white;">
<div style="display: flex; justify-content: space-between; align-items:center; padding: 1em;">
    <h1>Movimentações</h1>
<a href="cadastrarMovimentacao.php">
    <svg style="color: green;" class="" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
    </svg>
  </a>
</div>
<hr>

  <table class="table" style="padding: 5em;">
   <thead class="table-light">
    <tr>
     <th class="col">#</th>
       <th class="col">produto</th>
       <th class="col">qtd</th>
       <th class="col">tipo</th>
      </tr>
    </thead>
  <?php foreach($movimentacoes as $movimentacao){?>   
   <tbody>
      <tr>
        <td> <?php echo $movimentacao["id"];?></td>
        <td> <?php echo $movimentacao["produto_id"];?></td>
        <td> <?php echo $movimentacao["qtd"];?></td>
        <td>    <?php if($movimentacao["tipo"] == 1){?>
          <span class="badge bg-success">Entrada</span>
        <?php } else{?> 
          <span class="badge bg-danger">Saida</span>
          <?php }?> </td>
      </tr>
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