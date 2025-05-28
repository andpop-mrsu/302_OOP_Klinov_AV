<?php

namespace App;

class MaxPriceFilter implements ProductFilteringStrategy
{
<<<<<<< HEAD
    private $maxPrice;

    public function __construct(float $maxPrice)
    {
        $this->maxPrice = $maxPrice;
    }

    public function filter(Product $product): bool
    {
        $price = isset($product->sellingPrice) ? $product->sellingPrice : $product->listPrice;
        return $price <= $this->maxPrice;
    }
}
=======
    // ===================================
    //@TODO Реализовать стратегию фильтрации по цене товара
    // ===================================
}
>>>>>>> 9675c20d7b315ceaee3d90c60b5145060d661d11
