<?php
include '../database/DatabaseConnection.php';
include '../products/ProductFactory.php';
include '../products/Product.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];

    $connection = new DatabaseConnection();
    $productFactory = new CleaningProductFactory($connection->getConnection()); // ou FoodProductFactory
    $productFactory->createProduct($name, $price);


    header("Location: index.html"); // Redirect back to the insertion form
}
