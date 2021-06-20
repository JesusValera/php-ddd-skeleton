<?php

declare(strict_types=1);

namespace CodelyTv\Shared\Infrastructure;

use CodelyTv\Shared\Domain\CurrentTime;
use DateTimeImmutable;

final class DateTimeCurrentTime implements CurrentTime
{
    public function getDate(): string
    {
        $datetime = new DateTimeImmutable();

        return $datetime->format('Y-m-d H:i:s');
    }
}
