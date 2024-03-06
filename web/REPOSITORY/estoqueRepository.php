
<div class="alert alert-primary" role="alert">
    Repository-on
</div>
<?php
include_once("./CONNECTION/DatabaseConnection.php");

class EstoqueRepository{

    private DatabaseConnection $databaseConnection;
    private mysqli $conn;
    private $estoque;

    public function __construct(){
        $this->databaseConnection = new DatabaseConnection();
        $this->conn = $this->databaseConnection->getConnection();

    }

    public function getEstoques($nome, $id): array
    {
        #geral
        $sql = $this->getSelectEstoques();
        $res = $this->conn->query($sql);
        $estoques = [];
        while($row = $res->fetch_object()){
            $estoques[] = $this->convertObjectToArray($row);}
        return $estoques;
    }


    public function convertObjectToArray(object $object):array
    {
        return[
            "p.id" => $object->id,
            "p.nome" => $object->nome,
            "entradas" => $object->entradas,
            "saidas" => $object->saidas,
            "estoque" => $object->entradas - $object->saidas,
        ];
    }

    public function getSelectEstoques(){

        global $nome;
        global $id;

        $sql = "
        SELECT
           p.id,
        p.nome,
          COALESCE(SUM(CASE WHEN m.tipo = 1 THEN m.qtd END),0) as entradas,
          COALESCE(SUM(CASE WHEN m.tipo = 2  THEN m.qtd END),0) as saidas
            FROM
                produtos p 
            JOIN 
                 movimentacoes m on 
                    m.produto_id = p.id
        WHERE m.deletado is null
           ";

        if (!empty($nome) ) {
            $sql .= "and p.nome like '%$nome%'";
        }

        if (!empty($id)) {
            $sql .= "and p.id = '$id'";
        }


        $sql.= "GROUP BY p.id, p.nome";
        return $sql;
    }
}

    ?>


