<div class="alert alert-primary" role="alert">
    inluiu o repositorio!!!!!!!
</div>
<?php
include_once("./CONNECTION/DatabaseConnection.php");

class EstoqueRepository{

    private DatabaseConnection $databaseConnection;
    private mysqli $conn;
    private $filter;
    public $estoque;
    private array $filters;
    public int $count =0;

    public function __construct(array $filters)
    {
        $this->databaseConnection = new DatabaseConnection();
        $this->conn = $this->databaseConnection->getConnection();
        $this->filters = $filters;
    }

    public function getEstoques(): array
    {
        #geral
        $sql = $this->getSelectEstoques();
        $sql .= "GROUP BY p.id, p.nome";
        $res = $this->conn->query($sql);
        $estoques = [];
        while($row = $res->fetch_object()){
            $estoques[] = $this->convertObjectToArray($row);}
        return $estoques;
    }

    public function getFiltros(){

        $sql = $this->getSelectEstoques();
            #Aqui é um foreach pra trazer varios where
        foreach ($filters as $filter => $valor){
            if($count = 0){
                $choice = "Where";
            }else{
                $choice = "and";
            }
            $sql.= "$choice $filter => $valor";
            $count ++;
        }
        $sql.= "GROUP BY p.id, p.nome";
        $res = $this->conn->query($sql);
        #the work with convertObject
        $filtros = [];
        while($row = $res->fetch_object()){
            $filtros[] = $this->convertObjectToArray($row);}
        return $filtros;
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
           ";
        return $sql;
    }
}

    ?>