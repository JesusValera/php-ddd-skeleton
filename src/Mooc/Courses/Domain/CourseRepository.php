<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Courses\Domain;

use CodelyTv\Mooc\Shared\Domain\Course\CourseUuid;

interface CourseRepository
{
    public function save(Course $course): void;

    public function search(CourseUuid $uuid): ?Course;
}
