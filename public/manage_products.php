<?php
include '../database/DatabaseConnection.php';
include '../products/ProductFacade.php';

$connection = new DatabaseConnection();
$productFacade = new ProductFacade($connection->getConnection());

$products = $productFacade->readProducts();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Products</title>
    <link rel="stylesheet" href="css/manage.css">
</head>

<body>
    <div class="navbar">
        <a href="index.html" class="navbar-logo">MERCADO WEB2</a>
        <div class="navbar-right">
            <a href="manage_products.php">Manage Products</a>
            <a href="list_products.html">List Products</a>
        </div>
    </div>

    <h2 class="manage-title">Manage Products</h2>

    <table class="styled-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['category']; ?></td>
                    <td>
                        <a href="edit_product.php?id=<?php echo $product['id']; ?>">Edit</a>
                        <a href="delete_product.php?id=<?php echo $product['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>