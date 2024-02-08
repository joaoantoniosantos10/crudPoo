<?php

class DatabaseConnection{

   public function getConnection(): mysqli{
      $servername = "localhost";
      $username = "root";
      $password = "M@rata123";
      $dbname = "cadastro";
      return new mysqli ($servername, $username, $password, $dbname);
   }
}
?>

<div class="alert alert-success" role="alert">
  Banco-on
</div>