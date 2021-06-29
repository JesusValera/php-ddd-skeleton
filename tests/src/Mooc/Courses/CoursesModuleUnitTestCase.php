<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Courses;

use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use PHPUnit\Framework\TestCase;

abstract class CoursesModuleUnitTestCase extends TestCase
{
    protected CourseRepository $repository;

    protected function shouldSave(Course $course): void
    {
        $this->repository->method('save')->with($course);
    }

    protected function repository(): CourseRepository
    {
        return $this->repository = $this->repository ?: $this->createMock(CourseRepository::class);
    }
}