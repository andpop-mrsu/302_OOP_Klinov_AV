<?php

namespace App;

use App\Room;

class LuxuryRoom implements Room
{
    public function getDescription(): string
    {
        return "Люкс";
    }

    public function getPrice(): float
    {
        return 3000;
    }
}
