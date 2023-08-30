<?php

interface ProductFactory
{
    public function createProduct($name, $price);
}

class CleaningProductFactory implements ProductFactory
{
    private $connection;
    private $category = 'cleaning';

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function createProduct($name, $price)
    {
        $product = new Product($this->connection, $this->category);
        $product->createProduct($name, $price);
    }
}

class FoodProductFactory implements ProductFactory
{
    private $connection;
    private $category = 'food';

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function createProduct($name, $price)
    {
        $product = new Product($this->connection, $this->category);
        $product->createProduct($name, $price);
    }
}
