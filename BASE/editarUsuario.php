<h1>Editar Usuario</h1>
<?php
    include_once("Repositorys/UsuarioRepository.php");
    #ini_set serve ver alguns erros
    ini_set("display_errors", 1);
    $usuarioRepository = new UsuarioRepository();
    #só para trazer o id da tabela;
    $usuario = $usuarioRepository->getUsuario($_GET["id"]);
    $usuarios = $usuarioRepository->getUsuarios();
?>
        <form action="?page=salvarEdicao " method="POST">
        <input type="hidden" name="acao"value="editar">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        <div class="mb-3">
        <label for="nome">Nome</label>
        <input type="text" value="<?php
        echo $usuario['nome'];
        ?>" name="nome" class="form-control" id="nome">
        </div>
        <div class="mb-3">
        <label for="email">Email</label>
        <input type="email"  value="<?php
        echo $usuario['email'];
        ?>" name="email" id="email" class="form-control">
        </div>
        <div class="mb-3">
        <label for="senha">Senha</label>
        <input type="password" required name="senha" id="senha" class="form-control">
        </div>
        <div class="mb-3">
        <label for="data_nasc">Data de Nascimento</label>
        <input type="date"  value="<?php
        echo $usuario['data_nasc'];
        ?>"name="data_nasc" id="nascimento" class="form-control">
        </div>
        <div class="mb-3">
       <button type="submit" class="btn btn-primary">Enviar</button>
       </div>