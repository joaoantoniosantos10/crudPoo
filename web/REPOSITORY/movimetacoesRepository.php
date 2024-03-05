<div class="alert alert-primary" role="alert">
    Repository-on
</div>

<?php
include_once("../CONNECTION/DatabaseConnection.php");
class MovimentacoesRepository{

    private DatabaseConnection $dataBaseConnection;
    private mysqli $conn;

    public function __construct(){
        $this->dataBaseConnection = new DatabaseConnection();
        $this->conn = $this->dataBaseConnection->getConnection();
}

       public function cadastrarMovimentacoes(
        int $produto_id,
        int $qtd,
        int $tipo): bool{
        $sql = "INSERT INTO movimentacoes (produto_id, qtd, tipo) VALUES ('$produto_id', '$qtd', '$tipo')";
       return $this->conn->query($sql);
}

     public function editarMovimentacoes(
          int $id,
          int $produto_id,
          int $qtd,
          int $tipo
        ): bool
    {
        $sql = "UPDATE movimentacoes SET produto_id ='$produto_id', qtd ='$qtd', tipo ='$tipo' WHERE id = '$id'";
        return $this->conn->query($sql);
    }

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


        public function getMovimentacao(int $id): array {
        $sql = "SELECT * FROM movimentacoes WHERE id ='$id'";
        $res = $this->conn->query($sql);
        $movimentacoes = $res->fetch_object();

        if($movimentacoes){
            $retorno = $this->convertObjectToArray($movimentacoes);
        }
        return $retorno;
    }


        private function convertObjectToArray(object $object): array {
                return [
                "id" => $object->id,
                "produto_id" => $object->produto_id,
                "qtd" => $object->qtd,
                "tipo" => $object->tipo,
                ];
}

        private function getSelectMovimentacoes() {
           $sql = "SELECT * FROM movimentacoes";
           return $sql;
        }
    }



?>


