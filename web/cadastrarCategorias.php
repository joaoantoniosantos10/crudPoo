<?php include_once("HTML/head.php");?>

<form style="display: flex; justify-content: center; flex-direction:column; align-items:center; gap: 6em; "  action="salvarCategorias.php" method="post">

<h1>Cadastrar Categorias</h1>
<div style="display: flex; justify-content:center;" class="row mb-3">
    <div class="mb-3">
    <input required type="text" class="form-control container-sm" placeholder="Categoria" name="nome" id="nome" aria-label="First name">
    </div>
    <div>    
    <button class="btn btn-primary" >Enviar</button>
    </div>
</div>
</form>

<?php include_once("HTML/footer.php");?>

