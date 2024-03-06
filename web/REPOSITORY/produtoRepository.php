<div class="alert alert-primary" role="alert">
    Repository-on
</div>

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
        int $categoria_id): bool {
        $sql = "INSERT INTO produtos ( nome, categoria_id ) VALUES ('$nome', '$categoria_id')";
        return $this->conn->query($sql);
    }

        public function editarProdutos(
            string $nome,
            int $categoria_id,
            int $id):
           bool{
            $sql = "UPDATE produtos SET nome = '$nome', categoria_id = '$categoria_id' WHERE id = '$id'";
            return $this->conn->query($sql);
        }
        public function quantidade()
        {
            #PAGINACAO
            $total = "SELECT count(id) as cont FROM produtos";
            $consulta = $this->conn->query($total);
            $row = $consulta->fetch_object();
            $nova = $this->convertObjectToArray($row);
            return $nova;
        }

         public function deletarProdutos($id): bool
        {
            $sql = "UPDATE produtos SET deletado = '1' WHERE id = '$id'";
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
           "cont" => $object->cont,
         "categoria_id" => $object->categori_id,
         "deletado" => $object->deletado,
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

