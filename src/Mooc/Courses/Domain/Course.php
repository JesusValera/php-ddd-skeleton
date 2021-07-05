<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Courses\Domain;

use CodelyTv\Mooc\Shared\Domain\Course\CourseUuid;
use CodelyTv\Shared\Domain\Aggregate\AggregateRoot;

final class Course extends AggregateRoot
{
    private CourseUuid $uuid;
    private CourseName $name;
    private CourseDuration $duration;

    public function __construct(CourseUuid $uuid, CourseName $name, CourseDuration $duration)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->duration = $duration;
    }

    public static function create(CourseUuid $uuid, CourseName $name, CourseDuration $duration): self
    {
        $course = new self($uuid, $name, $duration);

        $course->record(new CourseCreatedDomainEvent($uuid->value(), $name->value(), $duration->value()));

        return $course;
    }

    public function uuid(): CourseUuid
    {
        return $this->uuid;
    }

    public function name(): CourseName
    {
        return $this->name;
    }

    public function duration(): CourseDuration
    {
        return $this->duration;
    }
}
