<?php 

    include_once("./CONNECTION/DatabaseConnection.php");
 
    class CategoriaRepository{
    private DatabaseConnection $dataBaseConnection;
    private mysqli $conn;

    public function __construct() {
        $this->dataBaseConnection = new DatabaseConnection();
        $this->conn = $this->dataBaseConnection->getConnection();
    }
    #ok
    #inserir dados no banco
    public function cadastrarCategorias(
        string $nome): bool {
        $sql = "INSERT INTO categorias ( nome ) VALUES ('$nome')";
        return $this->conn->query($sql);
    }


    #triplice da listagem
    public function getCategorias(): array {
        $sql = $this->getSelectCategorias();
        $res = $this->conn->query($sql);
        #crio um array
        $categorias = [];
        while($row = $res->fetch_object()) {
        $categorias[] = $this->convertObjectToArray($row);
        }
        return $categorias;
}

private function convertObjectToArray(object $object): array {
        return [
        "id" => $object->id,
        "nome" => $object->nome,
        ];
}

private function getSelectCategorias($id = null) {
        $sql = "SELECT * FROM categorias";
        if($id != null) {
                $sql .= " WHERE id = ". $id;
        }
        return $sql;
}


}

?>