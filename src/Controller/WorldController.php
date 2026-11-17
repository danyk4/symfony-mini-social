<?php

declare(strict_types=1);

namespace App\Controller;

use App\Domain\Service\FormatingService;
use App\Domain\Service\MessageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class WorldController extends AbstractController
{
    public function __construct(
        private readonly FormatingService $formatingService,
        private readonly MessageService $messageService,
    ) {}

    public function hello(): Response
    {
        $result = $this->formatingService->format($this->messageService->printMessages('world'));

        return new Response("<html><body>$result</body></html>");
    }
}
