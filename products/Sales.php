<?php 

class Sales
{

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function insertSaleData($idProduct, $qtdItems, $priceProduct, $priceWithDiscount) {
        $query = "INSERT INTO sales (id_product, qtd_items, created_at, price_product, price_discount) VALUES (?, ?, NOW(), ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("iidd", $idProduct, $qtdItems, $priceProduct, $priceWithDiscount);

        if ($stmt->execute()) {
            echo "Dados de venda inseridos no banco de dados com sucesso.";
        } else {
            echo "Erro ao inserir dados de venda no banco de dados: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>