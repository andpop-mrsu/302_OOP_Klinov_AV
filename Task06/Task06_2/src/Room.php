<?php

namespace App;

interface Room
{
    public function getDescription(): string;
    public function getPrice(): float;
}
