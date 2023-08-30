<?php
include '../products/sorting_strategies/PriceSortingStrategy.php';
include '../products/sorting_strategies/CategorySortingStrategy.php';
include '../products/ProductContext.php';
include '../database/DatabaseConnection.php';

$connection = new DatabaseConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["filter"])) {
    $filterType = $_POST["filter"];

    $productContext = new ProductContext();

    if ($filterType === 'min_price') {
        $productContext->setStrategy(new PriceSortingStrategy('asc'));
    } elseif ($filterType === 'max_price') {
        $productContext->setStrategy(new PriceSortingStrategy('desc'));
    } elseif ($filterType === 'category') {
        $productContext->setStrategy(new CategorySortingStrategy());
    }

    $sortedProducts = $productContext->sortProducts(getAllProducts($connection));
} else {
    $sortedProducts = getAllProducts($connection);
}

function getAllProducts($connection)
{
    $query = "SELECT * FROM products";
    $result = $connection->getConnection()->query($query);
    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    return $products;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Product List</title>
</head>

<body>
    <h2>Product List</h2>

    <form action="list_products.php" method="post">
        <p>Filter by:</p>
        <button type="submit" name="filter" value="min_price">Min Price</button>
        <button type="submit" name="filter" value="max_price">Max Price</button>
        <button type="submit" name="filter" value="category">Category</button>
    </form>

    <ul>
        <?php foreach ($sortedProducts as $product) : ?>
            <li><?php echo "{$product['name']} - {$product['price']} - {$product['category']}"; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>