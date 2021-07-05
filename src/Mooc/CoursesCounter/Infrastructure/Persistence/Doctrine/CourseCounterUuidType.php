<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\CoursesCounter\Infrastructure\Persistence\Doctrine;

use CodelyTv\Mooc\CoursesCounter\Domain\CoursesCounterUuid;
use CodelyTv\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CourseCounterUuidType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'course_counter_id';
    }

    protected function typeClassName(): string
    {
        return CoursesCounterUuid::class;
    }
}
