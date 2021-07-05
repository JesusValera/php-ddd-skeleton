<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Courses;

use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;

abstract class CoursesModuleUnitTestCase extends UnitTestCase
{
    private CourseRepository $repository;

    protected function shouldSave(Course $course): void
    {
        $this->repository()->method('save')->with($course);
    }

    protected function repository(): CourseRepository
    {
        if (!isset($this->repository)) {
            $this->repository = $this->createMock(CourseRepository::class);
        }

        return $this->repository;
    }
}
