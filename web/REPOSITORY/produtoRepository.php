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

        #triplice da listagem
    public function getProdutos(): array{
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

    private function getSelectProdutos($id = null){
        $sql = "SELECT * FROM produtos";
        if($id != null){
            $sql .= "WHERE id =". $id;
        }
        return $sql;
    }




  
}

?>