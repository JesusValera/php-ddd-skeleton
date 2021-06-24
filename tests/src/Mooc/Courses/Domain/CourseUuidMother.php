<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Courses\Domain;

use CodelyTv\Mooc\Courses\Domain\CourseUuid;

final class CourseUuidMother
{
    public static function create(string $value): CourseUuid
    {
        return new CourseUuid($value);
    }

    public static function random(): CourseUuid
    {
        return self::create(UuidMother::random());
    }
}
