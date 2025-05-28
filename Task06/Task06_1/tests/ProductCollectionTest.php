<?php

namespace App\Tests;

use App\Product;
use App\ProductCollection;
use App\ManufacturerFilter;
use App\MaxPriceFilter;
use PHPUnit\Framework\TestCase;

class ProductCollectionTest extends TestCase
{
    private $collection;

    protected function setUp(): void
    {
        $p1 = new Product();
        $p1->name = 'Шоколад';
        $p1->listPrice = 100;
        $p1->sellingPrice = 50;
        $p1->manufacturer = 'Красный Октябрь';

        $p2 = new Product();
        $p2->name = 'Мармелад';
        $p2->listPrice = 100;
        $p2->manufacturer = 'Ламзурь';

        $this->collection = new ProductCollection([$p1, $p2]);
    }

    public function testManufacturerFilter()
    {
        $result = $this->collection->filter(new ManufacturerFilter('Ламзурь'));
        $products = $result->getProductsArray();

        $this->assertCount(1, $products);
        $this->assertSame('Мармелад', $products[0]->name);
    }

    public function testMaxPriceFilter()
    {
        $result = $this->collection->filter(new MaxPriceFilter(50));
        $products = $result->getProductsArray();

        $this->assertCount(1, $products);
        $this->assertSame('Шоколад', $products[0]->name);
    }

    public function testMaxPriceNoDiscount()
    {
        $p3 = new Product();
        $p3->name = 'Печенье';
        $p3->listPrice = 40;
        $p3->manufacturer = 'Сладкий дом';

        $newCollection = new ProductCollection([$p3]);

        $result = $newCollection->filter(new MaxPriceFilter(50));
        $products = $result->getProductsArray();

        $this->assertCount(1, $products);
        $this->assertSame('Печенье', $products[0]->name);
    }
}