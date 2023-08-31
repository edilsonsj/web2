<?php
include '../database/DatabaseConnection.php';
include '../products/ProductFacade.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    $connection = new DatabaseConnection();
    $productFacade = new ProductFacade($connection->getConnection());
    $productFacade->deleteProduct($id);
    
    header("Location: manage_products.php");
} else {
    header("Location: manage_products.php");
}
