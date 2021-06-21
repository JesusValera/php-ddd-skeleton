<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Courses\Infrastructure;

use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Mooc\Courses\Domain\CourseUuid;

final class FileCourseRepository implements CourseRepository
{
    private const FILE_PATH = __DIR__ . '/courses';

    public function save(Course $course): void
    {
        file_put_contents($this->fileName($course->uuid()), serialize($course));
    }

    public function search(CourseUuid $uuid): ?Course
    {
        return file_exists($this->fileName($uuid))
            ? unserialize(file_get_contents($this->fileName($uuid)), [Course::class])
            : null;
    }

    private function fileName(CourseUuid $uuid): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $uuid->value());
    }
}
