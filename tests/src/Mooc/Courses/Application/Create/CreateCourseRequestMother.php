<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Courses\Application\Create;

use CodelyTv\Mooc\Courses\Application\CreateCourseRequest;
use CodelyTv\Mooc\Courses\Domain\CourseDuration;
use CodelyTv\Mooc\Courses\Domain\CourseName;
use CodelyTv\Mooc\Courses\Domain\CourseUuid;
use CodelyTv\Tests\Mooc\Courses\Domain\CourseDurationMother;
use CodelyTv\Tests\Mooc\Courses\Domain\CourseNameMother;
use CodelyTv\Tests\Mooc\Courses\Domain\CourseUuidMother;

final class CreateCourseRequestMother
{
    public static function create(
        CourseUuid $uuid,
        CourseName $name,
        CourseDuration $duration
    ): CreateCourseRequest {
        return new CreateCourseRequest($uuid->value(), $name->value(), $duration->value());
    }

    public static function random(): CreateCourseRequest
    {
        return self::create(
            CourseUuidMother::random(),
            CourseNameMother::random(),
            CourseDurationMother::random()
        );
    }
}
