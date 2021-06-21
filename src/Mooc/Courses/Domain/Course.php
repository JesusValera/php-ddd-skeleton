<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Courses\Domain;

final class Course
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
