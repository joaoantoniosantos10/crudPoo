<?php
include_once("HTML/head.php");
include_once("REPOSITORY/produtoRepository.php");
$produtoRepository = new ProdutoRepository();
$id = $_GET["id"];
$nome = $_GET["nome"];
$pagina =(isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
$produtos = $produtoRepository->getProdutos($pagina,$nome,$id);
$quantidade = $produtoRepository->quantidade();
include_once("PAGINACAO/paginacao.php");

?>

<div style="padding: 3em;">
    <div style="display: flex; justify-content: space-between; align-items:center; padding: 1em;">
        <h1>Produtos</h1>
        <a href="cadastrarProdutos.php">
            <svg style="color: green;"  xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
            </svg>
        </a> </div>

    <div>
        <div style="padding: 2em" class ="aside">
            <form action="Produtos.php" method="get" style="display: flex; justify-content: space-around;" id="filtro">

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

    <table style="padding: 5em;" class="table">
        <thead class="table-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">nome</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>

        <?php foreach($produtos as $produto){ ?>
            <tbody>
            <?php if(empty($produto["deletado"])){ ?>
                <tr>
                    <td> <?php echo $produto["id"];?></td>
                    <td> <?php echo $produto["nome"];?></td>
                    <td>
                        <a href="editarProdutos.php?id=<?php echo $produto["id"]; ?>" class="btn btn-success">Editar</a>
                    </td>
                    <td>
                        <a href="DELETE/deletarProduto.php?id=<?php echo $produto["id"]; ?>" class="btn btn-danger">Deletar</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        <?php } ?>
    </table>
    <?php
    if(empty($produtos)){?>
        <p class="alert alert-danger">Não encontrou categorias cadastradas</p>
    <?php }

    ?>
</div>

<?php
include_once("HTML/footer.php");
?>

<?php
include_once("HTML/footer.php");
exit();
?>


