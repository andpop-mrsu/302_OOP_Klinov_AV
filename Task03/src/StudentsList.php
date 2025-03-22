<?php

namespace App;

class StudentsList
{
    private array $students = [];

    public function add(Student $student): void
    {
        $this->students[] = $student;
    }

    public function count(): int
    {
        return count($this->students);
    }

    public function get(int $index): ?Student
    {
        return $this->students[$index] ?? null;
    }

    public function store(string $fileName): void
    {
        file_put_contents($fileName, serialize($this->students));
    }

    public function load(string $fileName): void
    {
        if (file_exists($fileName)) {
            $data = file_get_contents($fileName);
            $this->students = unserialize($data, ['allowed_classes' => [Student::class]]);
        }
    }
}
