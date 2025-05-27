<?php

namespace App;

use App\Room;

class StandardRoom implements Room
{
    public function getDescription(): string
    {
        return "Стандарт";
    }

    public function getPrice(): float
    {
        return 2000;
    }
}
