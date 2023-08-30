<?php

include 'ProductContext.php';


class ProductFacade
{
    private $connection;
    private $productContext;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->productContext = new ProductContext();
    }

    public function createCleaningProduct($name, $price)
    {
        $cleaningFactory = new CleaningProduct($this->connection, '');
        $cleaningFactory->createProduct($name, $price);
    }

    public function createFoodProduct($name, $price)
    {
        $foodFactory = new FoodProductFactory($this->connection);
        $foodFactory->createProduct($name, $price);
    }

    public function readProducts()
    {
        $product = new Product($this->connection, ''); // Empty category for fetching all products
        return $product->readProducts();
    }

    public function updateProduct($id, $name, $price)
    {
        $product = new Product($this->connection, ''); // Empty category for updating any product
        $product->updateProduct($id, $name, $price);
    }

    public function deleteProduct($id)
    {
        $product = new Product($this->connection, ''); // Empty category for deleting any product
        $product->deleteProduct($id);
    }

    public function sortProducts($strategy)
    {
        $this->productContext->setStrategy($strategy);
        return $this->productContext->sortProducts($this->readProducts());
    }
}
