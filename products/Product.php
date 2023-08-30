<?php

class Product
{
    private $connection;
    private $category;

    public function __construct($connection, $category)
    {
        $this->connection = $connection;
        $this->category = $category;
    }

    public function createProduct($name, $price)
    {
        $query = "INSERT INTO products (name, price) VALUES ('$name', '$price')";
        $this->connection->query($query);
    }

    public function readProducts()
    {
        $query = "SELECT * FROM products";
        $result = $this->connection->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateProduct($id, $name, $price)
    {
        $query = "UPDATE products SET name='$name', price='$price' WHERE id=$id";
        $this->connection->query($query);
    }

    public function deleteProduct($id)
    {
        $query = "DELETE FROM products WHERE id=$id";
        $this->connection->query($query);
    }
}
