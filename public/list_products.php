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
    <link rel="stylesheet" href="css/list_php.css">
</head>

<body>
    <div class="navbar">
        <a href="index.html">MERCADO WEB2</a>
        <div class="navbar-right">
            <a href="manage_products.php">MANAGE</a>
        </div>
    </div>

    <h2>Product List</h2>

    <form action="list_products.php" method="post">
        <p>Filter by:</p>
        <button type="submit" name="filter" value="min_price">Min Price</button>
        <button type="submit" name="filter" value="max_price">Max Price</button>
        <button type="submit" name="filter" value="category">Category</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $isEven = false;
            foreach ($sortedProducts as $product) {
                $isEven = !$isEven;
                $evenClass = $isEven ? "even" : "";
                echo "<tr class=\"$evenClass\">";
                echo "<td>{$product['name']}</td>";
                echo "<td>{$product['price']}</td>";
                echo "<td>{$product['category']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>