<?php
include_once("HTML/head.php");
include_once("REPOSITORY/produtoRepository.php");
include_once("REPOSITORY/ENUM/tipoMovimentacaoEnum.php");
include_once("REPOSITORY/movimetacoesRepository.php");
$produtoRepository = new ProdutoRepository();
$pagina = 0;
$produtos = $produtoRepository->getProdutos($pagina);
 $id = $_GET["id"];
$movimentacoes = new MovimentacoesRepository();
$setar = $movimentacoes->getMovimentacao($id);
?>

<?php if(!empty($produtos)) {?>

    <form style="padding: 2em;" action="SALVAR/salvarEdicaoMovimentacoes.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id = $_GET["id"]; ?>" >
        <select required ="form-control mb-3" name="produto_id" id="">
            <option value="" disabled selected> Selecione o produto </option>
            <?php
            foreach($produtos as $produto){ ?>
                <option value="<?php echo $produto['id'];?>"><?php echo $produto['nome'];?></option>
            <?php } ?>
        </select>
        <div>
            <label for="qtd">Quantidade</label>
            <input required class="form-control mb-4"  type="number" name="qtd" id="qtd" value="<?php echo $setar["qtd"];?>">
        </div>

        <select required ="form-control mb-3" name="tipo" id="tipo ">
            <option disabled value =""
              selected ><?php if($setar["tipo"] == 1){
              echo "Entrada";}
                else{ echo "Saida";} ?>  </option>
            <option value="<?php echo TipoMovimentacaoEnum::ENTRADA?>" > Entrada</option>
            <option value="<?php echo TipoMovimentacaoEnum::SAIDA ?>" > Saida</option>
            <button class="btn btn-primary" type="submit ">Cadastrar</button>
        </select>

        <button class="btn btn-primary" type="subtmit">Editar</button>
    </form>
<?php  }

include_once("HTML/footer.php"); ?>


