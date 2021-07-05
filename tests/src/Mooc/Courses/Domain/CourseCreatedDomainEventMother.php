<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Courses\Domain;

use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseCreatedDomainEvent;
use CodelyTv\Mooc\Courses\Domain\CourseDuration;
use CodelyTv\Mooc\Courses\Domain\CourseName;
use CodelyTv\Mooc\Shared\Domain\Course\CourseUuid;

final class CourseCreatedDomainEventMother
{
    public static function create(
        CourseUuid $uuid,
        CourseName $name,
        CourseDuration $duration
    ): CourseCreatedDomainEvent {
        return new CourseCreatedDomainEvent($uuid->value(), $name->value(), $duration->value());
    }

    public static function fromCourse(Course $course): CourseCreatedDomainEvent
    {
        return self::create($course->uuid(), $course->name(), $course->duration());
    }

    public static function random(): CourseCreatedDomainEvent
    {
        return self::create(
            CourseUuidMother::random(),
            CourseNameMother::random(),
            CourseDurationMother::random()
        );
    }
}
