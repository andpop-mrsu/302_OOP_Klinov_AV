<?php

namespace App\Tests;

use App\Student;
use App\StudentList;
use PHPUnit\Framework\TestCase;

class StudentListTest extends TestCase
{
    public function createStudentList()
    {
        // Создаем несколько студентов для тестирования
        $student1 = new Student('Klinov', 'Anton', 'FMiIT', 3, '302');
        $student2 = new Student('Ivanov', 'Ivan', 'FBiB', 1, '302B');
        $student3 = new Student('Sidorov', 'Sidr', 'GEO', 4, '3022');
        $student4 = new Student('Petrov', 'Petr', 'ISI', 5, '502');
        $student5 = new Student('Dostoevskiy', 'Fedor', 'FMiIT', 1, '102');
        $student6 = new Student('Esenin', 'Sergey', 'FF', 2, '202');

        // Создаем и добавляем студентов в список
        $students = new StudentList();
        $students->add($student1);
        $students->add($student2);
        $students->add($student3);
        $students->add($student4);
        $students->add($student5);
        $students->add($student6);

        return $students;
    }

    // Тест для метода current()
    public function testCurrent()
    {
        $students = $this->createStudentList();

        // Проверка, что current возвращает правильного студента
        $this->assertSame($students->get(0), $students->current());
        $students->next();
        $this->assertSame($students->get(1), $students->current());
    }

    // Тест для метода next()
    public function testNext()
    {
        $students = $this->createStudentList();

        // Проверка, что next переходит к следующему студенту
        $this->assertSame($students->get(0), $students->current());
        $students->next();
        $this->assertSame($students->get(1), $students->current());
        $students->next();
        $students->next();
        $this->assertSame($students->get(3), $students->current());
    }

    // Тест для метода key()
    public function testKey()
    {
        $students = $this->createStudentList();

        // Проверка, что key возвращает правильный ID студента
        $this->assertSame($students->get(0)->getId(), $students->key());
        $students->next();
        $this->assertSame($students->get(1)->getId(), $students->key());
    }

    // Тест для метода rewind()
    public function testRewind()
    {
        $students = $this->createStudentList();

        // Проверка, что rewind сбрасывает итератор к первому элементу
        $this->assertSame($students->get(0), $students->current());
        $students->next();
        $students->next();
        $students->next();
        $this->assertSame($students->get(3), $students->current());
        $students->rewind();
        $this->assertSame($students->get(0), $students->current());
    }

    // Тест для метода valid()
    public function testValid()
    {
        $students = $this->createStudentList();

        // Проверка, что valid возвращает false, если итератор вышел за пределы списка
        $this->assertTrue($students->valid());
        $students->next();
        $students->next();
        $students->next();
        $students->next();
        $students->next();
        $students->next();
        $this->assertFalse($students->valid());
    }

    // Тест для итерации с использованием foreach
    public function testForeach()
    {
        $students = $this->createStudentList();
        $i = 0;

        // Проверка, что в цикле foreach возвращается правильный студент
        foreach ($students as $index => $student) {
            $this->assertSame($students->get($i), $students->current());
            $i++;
        }
    }

    // Дополнительный тест для проверки работы метода get() с некорректным индексом
    public function testGetInvalidIndex()
    {
        $students = $this->createStudentList();

        // Проверка, что get() возвращает null для некорректного индекса
        $this->assertNull($students->get(10)); // Индекс за пределами списка
    }

    // Тест для проверки работы с пустым списком
    public function testEmptyStudentList()
    {
        $students = new StudentList();

        // Проверка, что пустой список не содержит студентов
        $this->assertSame(0, $students->count());
        $this->assertFalse($students->valid());
    }
}
