<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Courses\Domain;

use CodelyTv\Mooc\Shared\Domain\Course\CourseUuid;
use CodelyTv\Tests\Shared\Domain\MotherCreator;

final class UuidMother
{
    public static function create(string $value): CourseUuid
    {
        return new CourseUuid($value);
    }

    public static function random(): string
    {
        return MotherCreator::random()->unique()->uuid;
    }
}
