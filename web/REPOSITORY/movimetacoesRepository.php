<div class="alert alert-primary" role="alert">
    Repository-on
</div>

<?php
include_once("../CONNECTION/DatabaseConnection.php");
class MovimentacoesRepository
{

    private DatabaseConnection $dataBaseConnection;
    private mysqli $conn;

    public function __construct()
    {
        $this->dataBaseConnection = new DatabaseConnection();
        $this->conn = $this->dataBaseConnection->getConnection();
    }

    public function cadastrarMovimentacoes(
        int $produto_id,
        int $qtd,
        int $tipo): bool
    {
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

    public function getMovimentacoes($pagina): array
    {
        $sql = $this->getSelectMovimentacoes();
        $res = $this->conn->query($sql);
        #crio um array
        $movimentacoes = [];
        while ($row = $res->fetch_object()) {
            $movimentacoes[] = $this->convertObjectToArray($row);
        }
        return $movimentacoes;
    }
    public function quantidade()
    {
        #PAGINACAO
        $total = "SELECT count(id) as cont FROM movimentacoes";
        $consulta = $this->conn->query($total);
        $row = $consulta->fetch_object();
        $nova = $this->convertObjectToArray($row);
        return $nova;
    }

    public function getMovimentacao(int $id): array
    {
        $sql = "SELECT * FROM movimentacoes WHERE id ='$id'";
        $res = $this->conn->query($sql);
        $movimentacoes = $res->fetch_object();

        if ($movimentacoes) {
            $retorno = $this->convertObjectToArray($movimentacoes);
        }
        return $retorno;
    }

    public function deletarMovimentacoes($id): bool
    {
        $sql = "UPDATE movimentacoes SET deletado = '1' WHERE id = '$id'";
        return $this->conn->query($sql);
    }

    private function convertObjectToArray(object $object): array
    {
        return [
            "id" => $object->id,
            "produto_id" => $object->produto_id,
            "qtd" => $object->qtd,
            "tipo" => $object->tipo,
            "cont" => $object->cont,
            "deletado" => $object->deletado,
        ];
    }

    private function getSelectMovimentacoes()
    {
        global $pagina;
        if (($pagina != 0) || ($id = null)) {
            $inicio = (5 * $pagina) - 5;
            $sql = "SELECT * FROM movimentacoes  ORDER BY Id LIMIT 5 offset $inicio";
        } else {
            $sql = "SELECT * FROM movimentacoes";
        }
        if ($id != null) {
            $sql .= " WHERE id = " . $id;
        }
        return $sql;
    }

}


?>


