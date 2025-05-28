<?php

namespace App;

use App\Room;

abstract class RoomDecorator implements Room
{
    protected $room;

    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    public function getDescription(): string
    {
        return $this->room->getDescription();
    }

    public function getPrice(): float
    {
        return $this->room->getPrice();
    }
}
