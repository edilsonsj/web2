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
</head>

<body>
    <h2>Manage Products</h2>

    <table border="1">
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