<?php

require_once 'SortingStrategy.php';


class CategorySortingStrategy implements SortingStrategy
{
    public function sort($products)
    {
        usort($products, function ($a, $b) {
            return strcmp($a['category'], $b['category']);
        });
        return $products;
    }
}
