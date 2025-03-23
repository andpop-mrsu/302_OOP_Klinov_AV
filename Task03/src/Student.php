<?php

namespace App;

class Student
{
    private static int $idCounter = 1;
    private int $id;
    private string $lastname;
    private string $name;
    private string $faculty;
    private int $course;
    private string $group;

    public function __construct(string $lastname, string $name, string $faculty, int $course, string $group)
    {
        $this->id = self::$idCounter++;
        $this->lastname = $lastname;
        $this->name = $name;
        $this->faculty = $faculty;
        $this->course = $course;
        $this->group = $group;
    }

    public function getId(): int { return $this->id; }
    public function getLastname(): string { return $this->lastname; }
    public function getName(): string { return $this->name; }
    public function getFaculty(): string { return $this->faculty; }
    public function getCourse(): int { return $this->course; }
    public function getGroup(): string { return $this->group; }

    public function setLastname(string $lastname): self { $this->lastname = $lastname; return $this; }
    public function setName(string $name): self { $this->name = $name; return $this; }
    public function setFaculty(string $faculty): self { $this->faculty = $faculty; return $this; }
    public function setCourse(int $course): self { $this->course = $course; return $this; }
    public function setGroup(string $group): self { $this->group = $group; return $this; }

    public function __toString(): string
    {
        return "Id: {$this->id}\nФамилия: {$this->lastname}\nИмя: {$this->name}\nФакультет: {$this->faculty}\nКурс: {$this->course}\nГруппа: {$this->group}\n";
    }
}
