<?php

namespace App;

use App\Room;

class BreakfastDecorator extends RoomDecorator
{
    public function getDescription(): string
    {
        return parent::getDescription() . ", завтрак \"шведский стол\"";
    }

    public function getPrice(): float
    {
        return parent::getPrice() + 500;
    }
}
