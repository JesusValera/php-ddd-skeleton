<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Courses\Domain;

use CodelyTv\Mooc\Shared\Domain\Course\CourseUuid;
use CodelyTv\Tests\Shared\Domain\UuidMother;

final class CourseUuidMother
{
    public static function create(string $value): CourseUuid
    {
        return new CourseUuid($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): CourseUuid
    {
        return self::create(UuidMother::random());
    }
}
