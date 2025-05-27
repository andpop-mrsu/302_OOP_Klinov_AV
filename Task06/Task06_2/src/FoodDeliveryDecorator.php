<?php

namespace App;

use App\RoomDecorator;

class FoodDeliveryDecorator extends RoomDecorator
{
    public function getDescription(): string
    {
        return parent::getDescription() . ", доставка еды в номер";
    }

    public function getPrice(): float
    {
        return parent::getPrice() + 300;
    }
}
