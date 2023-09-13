<?php

class Student
{
    public string $name;
    public string $surname;

    public function getFullName(): string
    {
        return $this->name . " " . $this->surname;
    }
}

function getRandomName(): string {
    $names = ["John", "Jim", "Jack", "George", "Kevin"];
    return $names[rand(0, count($names) - 1)];
}

$students = [];

$student = new Student();
$student->name = getRandomName();
$student->surname = "Doe";
$students[] = $student;

foreach ($students as $student) {
    echo $student->getFullName() . PHP_EOL;
}
