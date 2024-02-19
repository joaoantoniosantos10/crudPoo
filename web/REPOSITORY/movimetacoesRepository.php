<p class="alert alert-primary">movimentacao include</p>
<?php
include_once("CONNECTION/DatabaseConnection.php");
class MovimentacoesRepository{

    private DatabaseConnection $dataBaseConnection;
    private mysqli $conn;

    public function __construct(){
        $this->dataBaseConnection = new DatabaseConnection();
        $this->conn = $this->dataBaseConnection->getConnection();
}

    public function cadastrarMovimentacoes(
        $produto_id,
        $qtd, 
        string $tipo): bool{
        $sql = "INSERT INTOmovimentacoes (produto_id, qtd, tipo) VALUES ('$produto_id', '$qtd', '$tipo')";
       return $this->conn->query($sql);
}

       #triplice da listagem
       public function getMovimentacoes(): array {
        $sql = $this->getSelectMovimentacoes();
        $res = $this->conn->query($sql);
        #crio um array
        $movimentacoes = [];
        while($row = $res->fetch_object()) {
        $movimentacoes[] = $this->convertObjectToArray($row);
        }
        return $movimentacoes;
}

        private function convertObjectToArray(object $object): array {
                return [
                "id" => $object->id,
                "produto_id" => $object->produto_id,
                "qtd" => $object->qtd,
                "tipo" => $object->tipo,
                ];
}

        private function getSelectMovimentacoes($id = null) {
           $sql = "SELECT * FROM movimentacoes";
          if($id != null) {
           $sql .= " WHERE id = ". $id;
         }
           return $sql;
}




}



?>