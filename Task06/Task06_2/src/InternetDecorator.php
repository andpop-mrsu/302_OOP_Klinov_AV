<?php

namespace App;

use App\RoomDecorator;

class InternetDecorator extends RoomDecorator
{
    public function getDescription(): string
    {
        return parent::getDescription() . ", выделенный Интернет";
    }

    public function getPrice(): float
    {
        return parent::getPrice() + 100;
    }
}
