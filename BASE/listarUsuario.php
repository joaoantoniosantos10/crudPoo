
<?php
   include_once("Repositorys/UsuarioRepository.php");
    $usuarioRepository = new UsuarioRepository();
    $usuarios = $usuarioRepository->getUsuarios();
    #Utilizando o nossa funcção que possue um array poderemos em um foreach percorre-lo
   echo "<pre>";
    ?> 
    <table class="table">
    <thead class="table-light">
    <tr>
    <th scope="col">#</th>
    <th scope="col">nome</th>
    <th scope="col">email</th>
    <th scope="col"></th>
    <th scope="col"></th>
    </tr>  
    </thead>
    
    <?php
    foreach($usuarios as $usuario){
    ?>
    <tbody>
    <tr>
    <td> <?php echo $usuario['id']; ?></td>
    <td> <?php echo $usuario['nome']; ?></td>
    <td> <?php echo $usuario['email']; ?></td>
    <td> <a class="btn btn-success" href='?page=editar&id=<?php echo $usuario['id'];?>'>Editar</a>
    </td>
    <td> <a class="btn btn-danger"  href='?page=excluir&id=<?php echo $usuario['id'];?>'>Apagar</a>
    </td>
    </tr>
    </tbody>
    <?php } ?>
    </table>
    <?php
    if (empty($usuarios)) {  
    ?>
    <p class='alert alert-danger'> Não encontrou resultados</p>
    <?php } 
    exit();
    
    #CHAMAMOS  O INCLUDE ONCE DO USUARIO REPOSITORY QUE POR SUA VEZ POSSUE ESSA CLASSE E A MESMA POSSUE O INCLUDE QUE POSSUE A PAGINA DE CONEXAO; INTERDEPENDÊNCIA MAS COM CADA CLASSE DISSOCIADA;
?>


