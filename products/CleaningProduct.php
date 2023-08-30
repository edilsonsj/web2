<?php

class CleaningProduct
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
        $query = "INSERT INTO products (name, price, category) VALUES ('$name', '$price', '$this->category')";
        $this->connection->query($query);
    }

    // Other methods for CRUD operations specific to cleaning products
}
