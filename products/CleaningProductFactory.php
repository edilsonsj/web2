<?php

require_once 'ProductFactory.php';


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
        $product->createProduct($name, $price, $this->category);
    }
}