<?php

namespace App\Tests;

use App\Truncater;
use PHPUnit\Framework\TestCase;

class TruncaterTest extends TestCase
{
    // Тест для пустой строки
    public function testEmptyString()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate(''), '');
    }

    // Тест для строки, которая не превышает максимальную длину
    public function testNoTruncation()
    {
        $truncater = new Truncater();
        $this->assertSame(
            $truncater->truncate('Это тестовая строка'),
            'Это тестовая строка'
        );
    }

    // Тест для строки, которая превышает максимальную длину
    public function testTruncateWithDefaultLength()
    {
        $truncater = new Truncater();
        $this->assertSame(
            $truncater->truncate('Это тестовая строка, которая должна быть обрезана', ['length' => 10]),
            'Это тестов...'
        );
    }

    // Тест для использования пользовательского разделителя
    public function testCustomSeparator()
    {
        $truncater = new Truncater();
        $this->assertSame(
            $truncater->truncate('Это тестовая строка, которая должна быть обрезана', ['length' => 10, 'separator' => '...']),
            'Это тестов...'
        );
    }

    // Тест для переопределения стандартных настроек
    public function testOverrideDefaults()
    {
        $truncater = new Truncater(['length' => 15, 'separator' => '***']);
        $this->assertSame(
            $truncater->truncate('Это тестовая строка, которая должна быть обрезана'),
            'Это тестовая ст***'
        );
    }

    // Тест для случая с отрицательной длиной
    public function testNegativeLength()
    {
        $truncater = new Truncater();
        $this->assertSame(
            $truncater->truncate('Это тестовая строка, которая должна быть обрезана', ['length' => -10]),
            'Это тестовая строка, которая должна быт...'
        );
    }

    // Тест для строки, длина которой меньше заданного максимума
    public function testShorterThanLength()
    {
        $truncater = new Truncater();
        $this->assertSame(
            $truncater->truncate('Короткая строка', ['length' => 50]),
            'Короткая строка'
        );
    }

    // Тест для случая, когда разделитель задан, но длина строки не превышает максимума
    public function testSeparatorWithoutTruncation()
    {
        $truncater = new Truncater(['separator' => '...']);
        $this->assertSame(
            $truncater->truncate('Тестовая строка', ['length' => 50]),
            'Тестовая строка'
        );
    }

    // Тест для пустого разделителя
    public function testEmptySeparator()
    {
        $truncater = new Truncater(['separator' => '']);
        $this->assertSame(
            $truncater->truncate('Это тестовая строка, которая будет обрезана', ['length' => 10]),
            'Это тестов'
        );
    }
}
