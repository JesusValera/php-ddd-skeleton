<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\CoursesCounter\Domain;

use CodelyTv\Mooc\CoursesCounter\Domain\CoursesCounterUuid;
use CodelyTv\Tests\Shared\Domain\UuidMother;

final class CoursesCounterUuidMother
{
    public static function create(string $value): CoursesCounterUuid
    {
        return new CoursesCounterUuid($value);
    }

    public static function random(): CoursesCounterUuid
    {
        return self::create(UuidMother::random());
    }
}
