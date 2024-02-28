
<?php 

    include_once("./CONNECTION/DatabaseConnection.php");
 
    class ProdutoRepository{
    private DatabaseConnection $dataBaseConnection;
    private mysqli $conn;

    public function __construct() {
        $this->dataBaseConnection = new DatabaseConnection();
        $this->conn = $this->dataBaseConnection->getConnection();
    }
    #ok
    #inserir dados no banco
    public function cadastrarProdutos(
        string $nome,
         $categoria_id): bool {
        $sql = "INSERT INTO produtos ( nome, categoria_id ) VALUES ('$nome', '$categoria_id')";
        return $this->conn->query($sql);
    }

        public function editarProdutos(
            string $nome, int $categoria_id
            int $id): bool
        {
            $sql = "UPDATE categorias SET nome = '$nome' WHERE id = '$id'";
            return $this->conn->query($sql);
        }

        public function deletarProdutos(int $id): bool
        {
            $sql = "DELETE FROM categorias WHERE id = '$id'";
            return $this->conn->query($sql);
        }

        public function getProdutos($pagina): array{
        $sql = $this->getSelectProdutos();
        $res = $this->conn->query($sql);
        #criar array
        $produtos = [];
        while($row = $res->fetch_object()){
            $produtos[] = $this->convertObjectToArray($row);
        }
        return $produtos;
    }

    private function convertObjectToArray(object $object): array {
       return [
        "id" => $object->id,
        "nome" => $object->nome,
       ];
    }

   private function getSelectProdutos()
    {
        global $pagina;
        if (($pagina != 0) || ($id = null)) {
            $inicio = (5 * $pagina) - 5;
            $sql = "SELECT * FROM produtos  ORDER BY Id LIMIT 5 offset $inicio";
        } else {
            $sql = "SELECT * FROM produtos";
        }
        if ($id != null) {
            $sql .= " WHERE id = " . $id;
        }
        return $sql;
    }





  
}

?>