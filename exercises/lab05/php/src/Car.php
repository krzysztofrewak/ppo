<?php

namespace Ppo\Lab05;

class Car {
    protected string $name;
    protected static string $type = "samochód osobowy";

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return static::$type . " " . $this->name;
    }
}
