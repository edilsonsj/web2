<?php
include '../products/ProductFacade.php';
//include '../products/ProductContext.php';
include '../products/Product.php';
include '../products/sorting_strategies/PriceSortingStrategy.php';
include '../products/sorting_strategies/CategorySortingStrategy.php';
include '../database/DatabaseConnection.php';

$connection = new DatabaseConnection();
$productFacade = new ProductFacade($connection->getConnection());

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["filter"])) {
    $filterType = $_POST["filter"];

    if ($filterType === 'min_price') {
        $sortedProducts = $productFacade->sortProducts(new PriceSortingStrategy('asc'));
    } elseif ($filterType === 'max_price') {
        $sortedProducts = $productFacade->sortProducts(new PriceSortingStrategy('desc'));
    } elseif ($filterType === 'category') {
        $sortedProducts = $productFacade->readProducts(); // No need to sort here, the facade handles it
    }
} else {
    $sortedProducts = $productFacade->readProducts();
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
