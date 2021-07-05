<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Courses\Application\Domain;

use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseCreatedDomainEvent;
use CodelyTv\Mooc\Courses\Domain\CourseDuration;
use CodelyTv\Mooc\Courses\Domain\CourseUuid;
use CodelyTv\Mooc\Courses\Domain\CourseName;
use CodelyTv\Tests\Mooc\Courses\Domain\CourseDurationMother;
use CodelyTv\Tests\Mooc\Courses\Domain\CourseNameMother;
use CodelyTv\Tests\Mooc\Courses\Domain\CourseUuidMother;

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
