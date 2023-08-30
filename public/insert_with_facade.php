<?php
include '../database/DatabaseConnection.php';
include '../products/ProductFacade.php'; // Inclua o ProductFacade

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $category = $_POST["category"]; // Obtenha a categoria selecionada

    $connection = new DatabaseConnection();
    $productFacade = new ProductFacade($connection->getConnection()); // Use o ProductFacade

    if ($category === 'food') {
        $productFacade->createFoodProduct($name, $price); // Use o método createFoodProduct
    } else {
        $productFacade->createCleaningProduct($name, $price); // Use o método createCleaningProduct
    }

    header("Location: index.html"); // Redirecione de volta para o formulário de inserção
}
