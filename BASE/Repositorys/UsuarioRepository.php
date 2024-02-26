<?php
        include_once("../DatabaseConnection.php");
        class UsuarioRepository {
        private DatabaseConnection $dataBaseConnection;
        private mysqli $conn;

        public function __construct() {
                 $this->dataBaseConnection = new DatabaseConnection();
                 $this->conn = $this->dataBaseConnection->getConnection();
        }       


        public function cadastrarUsuarios(
                string $nome, 
                string $email, 
                string $senha, 
                string $nascimento): bool {
                $sql = "INSERT INTO usuarios (nome, email, senha, data_nasc) VALUES ('$nome', '$email', '$senha', '$nascimento')";
                return $this->conn->query($sql);
        }

        #private function filtro() {
        #        return $this->teste($request);
       # }
        private function teste(array $array)
        {
                $sql = "SELECT * FROM usuario WHERE 1 = 1";

                foreach ($array as $column => $value) {
                        $sql .= " AND " . $column . " = " . $value;
                }
        }
        public function editarUsuarios(
                string $nome,
                string $email,
                string $senha,
                string $nascimento, 
                int $id): bool {             
                $sql = "UPDATE usuarios
                SET nome = '$nome', email = '$email', senha = '$senha', data_nasc ='$nascimento'
                WHERE id ='$id'";
                return $this->conn->query($sql);
        }

        public function deletarUsuarios($id):bool{
                $sql = "DELETE FROM usuarios WHERE id = '$id'";
                return $this->conn->query($sql);
        }

        public function getUsuario(int $id): ? array {
                $retorno = null;
                #  2 . Passamos um paramêtro o id
                $sql = $this->getSelectUser($id);
                $res = $this->conn->query($sql);
                $usuario = $res->fetch_object();

                if ($usuario) {
                        $retorno = $this->convertObjectToArray($usuario);
                }
                
                return $retorno;
        }

        public function getUsuarios(): array {
                $sql = $this->getSelectUser();
                $res = $this->conn->query($sql);
                #crio um array
                $usuarios = [];
                while($row = $res->fetch_object()) {
                $usuarios[] = $this->convertObjectToArray($row);
                }
                return $usuarios;
        }
        private function convertObjectToArray(object $object): array {
                return [
                "id" => $object->id,
                "nome" => $object->nome,
                "email" => $object->email,
                "data_nasc" => $object->data_nasc,
                ];
        }

        private function getSelectUser($user = null) {
                $sql = "SELECT * FROM usuarios";
        
                if($user != null) {
                        $sql .= " WHERE id = ". $user;
                }
                
                return $sql;
        }
}

?>