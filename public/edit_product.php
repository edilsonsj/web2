<?php
include '../database/DatabaseConnection.php';
include '../products/ProductFacade.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $connection = new DatabaseConnection();
    $productFacade = new ProductFacade($connection->getConnection());

    // Fetch the product by its ID
    $product = $productFacade->getProductById($id);

    if (!$product) {
        die("Product not found");
    }
} else {
    header("Location: manage_products.php"); // Redirect if ID not provided
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $category = $_POST["category"];

    // Update the product
    $productFacade->updateProduct($id, $name, $price, $category);

    header("Location: manage_products.php"); // Redirect after updating
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Product</title>
</head>

<body>
    <h2>Edit Product</h2>

    <form action="edit_product.php?id=<?php echo $id; ?>" method="post">
        <p>
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $product['name']; ?>" required>
        </p>
        <p>
            <label for="price">Price:</label>
            <input type="number" name="price" value="<?php echo $product['price']; ?>" required>
        </p>
        <p>
            <label for="category">Category:</label>
            <select name="category">
                <option value="cleaning" <?php echo ($product['category'] === 'cleaning') ? 'selected' : ''; ?>>Cleaning</option>
                <option value="food" <?php echo ($product['category'] === 'food') ? 'selected' : ''; ?>>Food</option>
            </select>
        </p>
        <p>
            <button type="submit">Update Product</button>
        </p>
    </form>
</body>

</html>