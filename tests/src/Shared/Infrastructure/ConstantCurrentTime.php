<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Shared\Infrastructure;

use CodelyTv\Shared\Domain\CurrentTime;

final class ConstantCurrentTime implements CurrentTime
{
    public function getDate(): string
    {
        return '2021-06-20 10:00:00';
    }
}
