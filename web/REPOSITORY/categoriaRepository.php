<div class="alert alert-primary" role="alert">
    Repository-on
</div>

<?php
include_once("web/CONNECTION/DatabaseConnection.php");

class CategoriaRepository
{
    private DatabaseConnection $dataBaseConnection;
    private mysqli $conn;

    public function __construct() {
        $this->dataBaseConnection = new DatabaseConnection();
        $this->conn = $this->dataBaseConnection->getConnection();
    }

    public function cadastrarCategorias(
        string $nome): bool
    {
        $sql = "INSERT INTO categorias ( nome ) VALUES ('$nome')";
        return $this->conn->query($sql);
    }

    public function editarCategorias(
        string $nome,
        int $id): bool
    {
        $sql = "UPDATE categorias SET nome = '$nome' WHERE id = '$id'";
        return $this->conn->query($sql);
    }

    public function deletarCategorias($id): bool
    {
        $sql = "UPDATE categorias SET deletado = '1' WHERE id = '$id'";
        return $this->conn->query($sql);
    }


    public function getCategorias($pagina,$nome, $id): array
    {
        $sql = $this->getSelectCategorias($nome,$id);
        $res = $this->conn->query($sql);
        $categorias = [];
        while ($row = $res->fetch_object()) {
            $categorias[] = $this->convertObjectToArray($row);
        }
        return $categorias;
    }

    public function quantidade()
    {
        #PAGINACAO
        $total = "SELECT count(id) as cont FROM categorias";
        $consulta = $this->conn->query($total);
        $row = $consulta->fetch_object();
        $nova = $this->convertObjectToArray($row);
        return $nova;
    }

    private function convertObjectToArray(object $object): array
    {
        return [
            "id" => $object->id,
            "nome" => $object->nome,
            "cont" => $object->cont,
            "deletado" => $object->deletado,
        ];
    }

    private function getSelectCategorias()
    {
        global $pagina;

        if (($pagina != 0) || ($id = null)) {
            $inicio = (5 * $pagina) - 5;
            $sql = "SELECT * FROM categorias  ORDER BY Id LIMIT 5 offset $inicio";
        } else {
            $sql = "SELECT * FROM categorias";
        }

        if ($id != null) {
            $sql .= " WHERE id = " . $id;
        }
        return $sql;
    }
}

?>


