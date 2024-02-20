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
    public function getCategorias($pagina): array {

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

public function quantidade(){
    #PAGINACAO
    $total = "SELECT count(id) FROM categorias";
    $consulta = $this->conn->query($total);
    $row = $consulta->fetch_object();
}



private function getSelectCategorias($id = null) {
        global $pagina;
        $limite = 5;
        $inicio = ($pagina * $limite) - 5;

    $sql = "SELECT * FROM categorias";
        return $sql;
}


}

?>