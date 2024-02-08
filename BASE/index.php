
<!doctype html>
<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li class="nav-item">
    <a href="index.php" class="nav-link active" aria-current="page" href="#">Home</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="?page=novo">Novo usuario</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="?page=listar">Listar usuario</a>
    </li>
    </ul>
   </div>
  </div>
</nav>
 
<div class="container">
  <div class="row">
    <div class="col mt-5">
      
  <?php
  include_once("DatabaseConnection.php");
  switch(@$_REQUEST["page"]){
    case "novo":
      include_once("novoUsuario.php");
         break;
    case "listar":
        include_once("listarUsuario.php");
        break;
    case "salvar":
        include_once("salvarUsuario.php");
        break;
    case "editar":
        include_once("editarUsuario.php");
        break;
        case "salvarEdicao":
          include_once("salvarEdicao.php");
          break;
        case "excluir":
            include_once("deletarUsuario.php");
            break;
    default: 
          echo "<h1>Bem vindos!<h1>";
          echo "<h4>Crud de cadastro</h4>";
  }

  
#Sisteminha que puxa as paginas que quando enviadas as informações temos um input hidden que traz um include para essa pagina
 
  ?>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>