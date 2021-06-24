<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Courses\Domain;

use CodelyTv\Mooc\Courses\Application\CreateCourseRequest;
use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseDuration;
use CodelyTv\Mooc\Courses\Domain\CourseName;
use CodelyTv\Mooc\Courses\Domain\CourseUuid;

final class CourseMother
{
    public static function create(CourseUuid $uuid, CourseName $name, CourseDuration $duration): Course
    {
        return new Course($uuid, $name, $duration);
    }

    public static function fromRequest(CreateCourseRequest $request): Course
    {
        return self::create(
            CourseUuidMother::create($request->uuid()),
            CourseNameMother::create($request->name()),
            CourseDurationMother::create($request->duration())
        );
    }

    public static function random(): Course
    {
        return self::create(
            CourseUuidMother::random(),
            CourseNameMother::random(),
            CourseDurationMother::random()
        );
    }
}
