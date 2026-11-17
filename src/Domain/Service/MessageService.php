<?php

declare(strict_types=1);

namespace App\Domain\Service;

class MessageService
{
    public function __construct(private array $greetingService = [], private array $formatingService = []) {}

    public function addGreeting(GreetingService $greetingService): void
    {
        $this->greetingService[] = $greetingService;
    }

    public function addFormating(FormatingService $formatingService): void
    {
        $this->formatingService[] = $formatingService;
    }

    public function printMessages(string $name): string
    {
        $result = '';
        foreach ($this->greetingService as $greetingService) {
            $current = $greetingService->greet($name);
            foreach ($this->formatingService as $formatingService) {
                $current = $formatingService->format($current);
            }
            $result .= $current;
        }

        return $result;
    }
}
