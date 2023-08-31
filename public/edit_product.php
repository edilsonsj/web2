<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'market_db';

$connection = new mysqli($host, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: index.html"); // Redirect if ID not provided
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Fetch the product by its ID
    $query = "SELECT * FROM products WHERE id = $id";
    $result = $connection->query($query);
    $product = $result->fetch_assoc();

    if (!$product) {
        die("Product not found");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $category = $_POST["category"];

    // Update the product
    $updateQuery = "UPDATE products SET name='$name', price='$price', category='$category' WHERE id=$id";
    $connection->query($updateQuery);

    header("Location: manage_products.php"); // Redirect after updating
    exit();
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="css/edit.css">
</head>

<body>
    <div class="navbar">
        <a class="navbar-logo" href="index.html">MERCADO WEB2</a>
        <div class="navbar-right">
            <a href="manage_products.php">Manage Products</a>
            <a href="list_products.html">List Products</a>
        </div>
    </div>

    <h2 class="edit-title">Edit Product</h2>

    <form class="styled-form" action="edit_product.php?id=<?php echo $id; ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br><br>

        <label for="price">Price:</label>
        <input type="number" name="price" value="<?php echo $product['price']; ?>" required><br><br>

        <p>Select Category:</p>
        <input type="radio" id="cleaning" name="category" value="cleaning" <?php echo ($product['category'] === 'cleaning') ? 'checked' : ''; ?>>
        <label for="cleaning">Cleaning</label><br>
        <input type="radio" id="food" name="category" value="food" <?php echo ($product['category'] === 'food') ? 'checked' : ''; ?>>
        <label for="food">Food</label><br><br>

        <input type="submit" value="Update Product">
    </form>
</body>

</html>
