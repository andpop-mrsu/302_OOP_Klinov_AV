<?php

namespace App;

use App\Room;

class EconomyRoom implements Room
{
    public function getDescription(): string
    {
        return "Эконом";
    }

    public function getPrice(): float
    {
        return 1000;
    }
}
