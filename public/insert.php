<?php
include '../database/DatabaseConnection.php';
include '../products/Product.php';
include '../products/CleaningProductFactory.php';
include '../products/FoodProductFactory.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $category = $_POST["category"]; // Get selected category
    
    $connection = new DatabaseConnection();
    $productFactory = new CleaningProductFactory($connection->getConnection()); // Default to CleaningProductFactory
    if ($category === 'food') {
        $productFactory = new FoodProductFactory($connection->getConnection());
    }
    
    $productFactory->createProduct($name, $price);
    
    header("Location: index.html"); // Redirect back to the insertion form
}
