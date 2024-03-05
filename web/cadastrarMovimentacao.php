<?php
 include_once("HTML/head.php");
 include_once("REPOSITORY/produtoRepository.php");
 include_once("REPOSITORY/ENUM/tipoMovimentacaoEnum.php");
  $produtoRepository = new ProdutoRepository();
  $pagina = 0;
 $produtos = $produtoRepository->getProdutos($pagina);
?>

<?php if(!empty($produtos)) {?>

    <form style="padding: 2em;" action="SALVAR/salvarMovimentacao.php" method="post">
    <select required ="form-control mb-3" name="produto_id" id="">
    <option selected> Selecione o produto </option>
    <?php
    foreach($produtos as $produto){ ?>
        <option value="<?php echo $produto['id'];?>"><?php echo $produto['nome'];?></option>
    <?php } ?>
    </select>
    <div>
        <label for="qtd">Quantidade</label>
        <input required class="form-control mb-4"  type="number" name="qtd" id="qtd">
    </div>

    <select required ="form-control mb-3" name="tipo" id="">
    <option selected> Tipo de Movimentação </option>
    <option value="<?php echo TipoMovimentacaoEnum::ENTRADA?>" selected> Entrada</option>
    <option value="<?php echo TipoMovimentacaoEnum::SAIDA ?>" selected> Saida</option>
    <button class="btn btn-primary" type="submit ">Cadastrar</button>
    </select>

    <button class="btn btn-primary" type="subtmit">Cadastrar</button>
        </form>
 

<?php } ?>


<?php include_once("HTML/footer.php"); ?>

