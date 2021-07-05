<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Courses\Infrastructure\Persistence\Mappings;

use CodelyTv\Mooc\Shared\Domain\Course\CourseUuid;
use CodelyTv\Shared\Infrastructure\Persistence\Mappings\UuidType;

final class CourseUuidType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'course_uuid';
    }

    protected function typeClassName(): string
    {
        return CourseUuid::class;
    }
}
