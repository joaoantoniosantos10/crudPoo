<?php

class DatabaseConnection {

        public function getConnection(): mysqli {
        $severname = "localhost";
        $username = "root";
        $password = "M@rata123";
        $dbname = "cadastro";
        return new mysqli($severname, $username,$password, $dbname);
    }
}

#cria a classe, chama uma funcao com o nome do que vc quer fazer e um metodo mysqli e depois fazer o basico da coenxao;
?>
