<?php

class ProductContext
{
    private $strategy;

    public function setStrategy(SortingStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function sortProducts(array $products)
    {
        return $this->strategy->sort($products);
    }
}
