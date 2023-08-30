<?php

require_once 'SortingStrategy.php';

class PriceSortingStrategy implements SortingStrategy
{
    private $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function sort($products)
    {
        usort($products, function ($a, $b) {
            return ($this->order === 'asc') ? ($a['price'] - $b['price']) : ($b['price'] - $a['price']);
        });
        return $products;
    }
}
