<?php

declare(strict_types=1);

namespace App\Domain\Service;

class GreetingService
{
    public function __construct(private readonly string $greet) {}

    public function greet(string $name): string
    {
        return $this->greet.', '.$name.'!';
    }
}
