<?php 

include 'Sales.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idProduct = $_POST["idprod"];
    $qtdItems = $_POST["amount"];
    $paymentMethod = $_POST["btn-radio"];

    // Crie o objeto Contexto e aplique a estratégia de desconto correspondente
    switch ($paymentMethod) {
        case "Money":
            $method = new StrategyContext(new Money());
            break;
        case "Pix":
            $method = new StrategyContext(new Pix());
            break;
        case "Credit":
            $method = new StrategyContext(new Credit());
            break;
        case "Debt":
            $method = new StrategyContext(new Debt());
            break;
        default:
            throw new InvalidArgumentException("Invalid payment method");
    }

    // Calcule o preço com desconto
    $priceProduct = 100.0; // Valor original (exemplo)
    $priceWithDiscount = $method->apllyDiscount($priceProduct);

    // Chame a função para inserir os dados na tabela de vendas
    $sales->insertSaleData($idProduct, $qtdItems, $priceProduct, $priceWithDiscount);
}

$conexao->close();
?>