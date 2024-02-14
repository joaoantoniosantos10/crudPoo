<i class="alert alert-sucess">include on</i>
<?php 
    include_once("./CONNECTION/DatabaseConnection.php");
 
    class EstoqueRepository{

        private DatabaseConnection $databaseConnection;
        private mysqli $conn;
        public $estoque;
        private array $filters;

        public function __construct(array $filters)
        {
            $this->databaseConnection = new DatabaseConnection();
            $this->conn = $this->databaseConnection->getConnection();
            $this->filters = $filters;
        }
            public $filtro;


        public function getEstoques($filters,$filtro): array
        {
            $sql = $this->getSelectEstoques();
            foreach($filters as $filter => $valor) 
            {
                $sql .= " " . "Where " . $filtro . " = " . $valor;
            }
 
            $sql .= "GROUP BY p.id, p.nome";

            $res = $this->conn->query($sql);
            $estoques = [];
            while($row = $res->fetch_object()){
            $estoques[] = $this->convertObjectToArray($row);
            while($row = $res->fetch_object()){
                $estoques[] = $this->convertObjectToArray($row);
            }
            }
            return $estoques;
        }

        private function convertObjectToArray(object $object): array
        {
            $saidas = $object->saidas;
            $entradas = $object->entradas;
            $estoque = $entradas - $saidas;

            return[
                "p.id" => $object->id,
                "p.nome" => $object->nome,
                "entradas" => $object->entradas,
                "saidas" => $object->saidas,
                "estoque" => $estoque,
            ];
        }

        private function getSelectEstoques(): string{
            $sql = "SELECT p.id,
                           p.nome,
                           COALESCE(
                            SUM(CASE WHEN m.tipo = 1 THEN
                             m.qtd 
                             END) , 0) as entradas,
                            COALESCE(
                                SUM(CASE WHEN  m.tipo = 2 THEN
                                 m.qtd END), 0) as saidas
                    FROM produtos p
                    JOIN movimentacoes m ON m.produto_id = p.id
                    ";
            return $sql;
        }
}

?>