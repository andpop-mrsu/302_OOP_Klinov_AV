<?php

function runTest()
{
    try {
        // String representation test
        $m1 = new Fraction(2, 4);
        $correct = "1/2";
        echo "Ожидается: $correct" . PHP_EOL;
        echo "Получено: " . $m1->__toString() . PHP_EOL;

        if ($m1 == $correct) {
            echo "Тест пройден" . PHP_EOL;
        } else {
            echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
        }

        // Adding test
        $m2 = new Fraction(3, 8);
        $m3 = $m1->add($m2);
        $correct = "7/8";
        echo "Ожидается: $correct" . PHP_EOL;
        echo "Получено: " . $m3->__toString() . PHP_EOL;

        if ($m3 == $correct) {
            echo "Тест пройден" . PHP_EOL;
        } else {
            echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
        }

        // Subtraction test
        $m4 = new Fraction(-5, 2);
        $m5 = $m4->sub($m2);
        $correct = "-2'7/8";
        echo "Ожидается: $correct" . PHP_EOL;
        echo "Получено: " . $m5->__toString() . PHP_EOL;

        if ($m5 == $correct) {
            echo "Тест пройден" . PHP_EOL;
        } else {
            echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
        }
    } catch (InvalidArgumentException $e) {
        echo $e->getMessage();
    }
}