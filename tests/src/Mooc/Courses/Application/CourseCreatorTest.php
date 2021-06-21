<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Courses\Application;

use CodelyTv\Mooc\Courses\Application\CourseCreator;
use CodelyTv\Mooc\Courses\Application\CreateCourseRequest;
use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseDuration;
use CodelyTv\Mooc\Courses\Domain\CourseName;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Mooc\Courses\Domain\CourseUuid;
use PHPUnit\Framework\TestCase;

final class CourseCreatorTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_course(): void
    {
        $repository = $this->createMock(CourseRepository::class);
        $creator = new CourseCreator($repository);

        $uuid = '55ECB36B-53CE-4138-9133-9382DB74FC3C';
        $name = 'some-name';
        $duration = 'some-duration';

        $course = new Course(
            new CourseUuid($uuid),
            new CourseName($name),
            new CourseDuration($duration)
        );

        $repository->method('save')->with($course);

        $creator->__invoke(new CreateCourseRequest($uuid, $name, $duration));
    }
}
