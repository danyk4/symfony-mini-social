<?php

declare(strict_types=1);

namespace App\Domain\Service;

class FormatingServiceFactory
{
    public static function strongFormatingService(): FormatingService
    {
        return new FormatingService()->setTag('strong');
    }

    public function citeFormatingService(): FormatingService
    {
        return new FormatingService()->setTag('cite');
    }

    public function headerFormatingService(int $level): FormatingService
    {
        return new FormatingService()->setTag("h$level");
    }
}
