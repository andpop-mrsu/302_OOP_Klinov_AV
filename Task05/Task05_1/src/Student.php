<?php

namespace App;

class Student
{
    public static $globalId = 1;
    private $id;
    private $lastName;
    private $firstName;
    private $faculty;
    private $course;
    private $group;

    public function __construct(string $lastName, string $firstName, string $faculty, int $course, string $group)
    {
        $this->id = self::$globalId++;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->faculty = $faculty;
        $this->course = $course;
        $this->group = $group;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getLastName(): string
    {
        return $this->lastName;
    }
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    public function getFaculty(): string
    {
        return $this->faculty;
    }
    public function getCourse(): int
    {
        return $this->course;
    }
    public function getGroup(): string
    {
        return $this->group;
    }

    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }
    public function setFaculty(string $faculty)
    {
        $this->faculty = $faculty;
        return $this;
    }
    public function setCourse(int $course)
    {
        $this->course = $course;
        return $this;
    }
    public function setGroup(string $group)
    {
        $this->group = $group;
        return $this;
    }

    public function __toString()
    {
        $string = "Id: $this->id" . PHP_EOL .
            "Фамилия: $this->lastName" . PHP_EOL .
            "Имя: $this->firstName" . PHP_EOL .
            "Факультет: $this->faculty" . PHP_EOL .
            "Группа: $this->group" . PHP_EOL;
        return $string;
    }
}
