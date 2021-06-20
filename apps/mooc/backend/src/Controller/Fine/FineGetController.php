<?php

declare(strict_types=1);

namespace CodelyTv\Apps\Mooc\Backend\Controller\Fine;

use CodelyTv\Shared\Domain\CurrentTime;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class FineGetController
{
    private CurrentTime $dateTime;

    public function __construct(CurrentTime $dateTime)
    {
        $this->dateTime = $dateTime;
    }

    public function __invoke(string $name): Response
    {
        return new JsonResponse(
            [
                'name' => sprintf('Everything is fine %s', $name),
                'date' => $this->dateTime->getDate(),
            ],
        );
    }
}
