<?php

namespace App;

use App\RoomDecorator;

class SofaDecorator extends RoomDecorator
{
    public function getDescription(): string
    {
        return parent::getDescription() . ", дополнительный диван";
    }

    public function getPrice(): float
    {
        return parent::getPrice() + 500;
    }
}
