<?php

namespace App;

use App\RoomDecorator;
use App\DinnerDecorator;
use App\FoodDeliveryDecorator;
use App\EconomyRoom;
use App\InternetDecorator;
use App\LuxuryRoom;
use App\SofaDecorator;
use App\BreakfastDecorator;
use PHPUnit\Framework\TestCase;

class RoomDecoratorTest extends TestCase
{
    public function testEconomyRoom()
    {
        $room = new EconomyRoom();
        $this->assertEquals("Эконом", $room->getDescription());
        $this->assertEquals(1000, $room->getPrice());
    }

    public function testStandardRoomWithInternet()
    {
        $room = new StandardRoom();
        $room = new InternetDecorator($room);

        $this->assertEquals("Стандарт, выделенный Интернет", $room->getDescription());
        $this->assertEquals(2100, $room->getPrice());
    }

    public function testLuxuryRoomWithAllServices()
    {
        $room = new LuxuryRoom();
        $room = new InternetDecorator($room);
        $room = new SofaDecorator($room);
        $room = new FoodDeliveryDecorator($room);
        $room = new BreakfastDecorator($room);
        $room = new DinnerDecorator($room);

        $expectedDescription = "Люкс, выделенный Интернет, дополнительный диван, доставка еды в номер, завтрак \"шведский стол\", ужин";
        $this->assertEquals($expectedDescription, $room->getDescription());
        $this->assertEquals(5200, $room->getPrice());
    }

    public function testMultipleDecorators()
    {
        $room = new EconomyRoom();
        $room = new BreakfastDecorator($room);
        $room = new DinnerDecorator($room);

        $this->assertEquals("Эконом, завтрак \"шведский стол\", ужин", $room->getDescription());
        $this->assertEquals(2300, $room->getPrice());
    }
}
