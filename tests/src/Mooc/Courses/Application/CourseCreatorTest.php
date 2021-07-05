<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Courses\Application;

use CodelyTv\Mooc\Courses\Application\CourseCreator;
use CodelyTv\Tests\Mooc\Courses\Application\Create\CreateCourseRequestMother;
use CodelyTv\Tests\Mooc\Courses\CoursesModuleUnitTestCase;
use CodelyTv\Tests\Mooc\Courses\Domain\CourseCreatedDomainEventMother;
use CodelyTv\Tests\Mooc\Courses\Domain\CourseMother;

final class CourseCreatorTest extends CoursesModuleUnitTestCase
{
    private CourseCreator $creator;

    public function setUp(): void
    {
        parent::setUp();

        $this->creator = new CourseCreator($this->repository(), $this->domainEventPublisher());
    }

    /** @test */
    public function it_should_create_a_valid_course(): void
    {
        $request = CreateCourseRequestMother::random();
        $course = CourseMother::fromRequest($request);
        $domainEvent = CourseCreatedDomainEventMother::fromCourse($course);

        $this->shouldSave($course);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->creator->__invoke($request);
    }
}
