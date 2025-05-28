<?php

namespace App;

class ManufacturerFilter implements ProductFilteringStrategy
{
<<<<<<< HEAD
    private $manufacturer;

    public function __construct(string $manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    public function filter(Product $product): bool
    {
        return $product->manufacturer === $this->manufacturer;
    }
}
=======
    // ===================================
    //@TODO Реализовать стратегию фильтрации по производителю товара
    // ===================================
}
>>>>>>> 9675c20d7b315ceaee3d90c60b5145060d661d11
