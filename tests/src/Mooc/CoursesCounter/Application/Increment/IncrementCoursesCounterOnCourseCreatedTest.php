<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\CoursesCounter\Application\Increment;

use CodelyTv\Mooc\CoursesCounter\Application\Increment\CoursesCounterIncrementer;
use CodelyTv\Mooc\CoursesCounter\Application\Increment\IncrementCoursesCounterOnCourseCreated;
use CodelyTv\Tests\Mooc\Courses\Domain\CourseCreatedDomainEventMother;
use CodelyTv\Tests\Mooc\Courses\Domain\CourseUuidMother;
use CodelyTv\Tests\Mooc\CoursesCounter\CoursesCounterModuleUnitTestCase;
use CodelyTv\Tests\Mooc\CoursesCounter\Domain\CoursesCounterIncrementedDomainEventMother;
use CodelyTv\Tests\Mooc\CoursesCounter\Domain\CoursesCounterMother;

final class IncrementCoursesCounterOnCourseCreatedTest extends CoursesCounterModuleUnitTestCase
{
    private $subscriber;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subscriber = new IncrementCoursesCounterOnCourseCreated(
            new CoursesCounterIncrementer(
                $this->repository(),
                $this->uuidGenerator(),
                $this->domainEventPublisher()
            )
        );
    }

    /** @test */
    public function it_should_initialize_a_new_counter(): void
    {
        $event = CourseCreatedDomainEventMother::random();

        $courseId = CourseUuidMother::create($event->aggregateId());
        $newCounter = CoursesCounterMother::withOne($courseId);
        $domainEvent = CoursesCounterIncrementedDomainEventMother::fromCounter($newCounter);

        $this->shouldSearch(null);
        $this->shouldGenerateUuid($newCounter->id()->value());
        $this->shouldSave($newCounter);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->notify($event, $this->subscriber);
    }

    /** @test */
    public function it_should_increment_an_existing_counter(): void
    {
        $event = CourseCreatedDomainEventMother::random();

        $courseId = CourseUuidMother::create($event->aggregateId());
        $existingCounter = CoursesCounterMother::random();
        $incrementedCounter = CoursesCounterMother::incrementing($existingCounter, $courseId);
        $domainEvent = CoursesCounterIncrementedDomainEventMother::fromCounter($incrementedCounter);

        $this->shouldSearch($existingCounter);
        $this->shouldSave($incrementedCounter);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->notify($event, $this->subscriber);
    }

    /** @test */
    public function it_should_not_increment_an_already_incremented_course(): void
    {
        $event = CourseCreatedDomainEventMother::random();

        $courseId = CourseUuidMother::create($event->aggregateId());
        $existingCounter = CoursesCounterMother::withOne($courseId);

        $this->shouldSearch($existingCounter);

        $this->notify($event, $this->subscriber);
    }
}
