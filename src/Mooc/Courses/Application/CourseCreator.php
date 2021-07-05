<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Courses\Application;

use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseDuration;
use CodelyTv\Mooc\Courses\Domain\CourseName;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Mooc\Shared\Domain\Course\CourseUuid;
use CodelyTv\Shared\Domain\Bus\DomainEventPublisher;

final class CourseCreator
{
    private CourseRepository $repository;
    private DomainEventPublisher $publisher;

    public function __construct(CourseRepository $repository, DomainEventPublisher $publisher)
    {
        $this->repository = $repository;
        $this->publisher = $publisher;
    }

    public function __invoke(CreateCourseRequest $request)
    {
        $uuid = new CourseUuid($request->uuid());
        $name = new CourseName($request->name());
        $duration = new CourseDuration($request->duration());

        $course = Course::create($uuid, $name, $duration);

        $this->repository->save($course);
        $this->publisher->publish(...$course->pullDomainEvents());
    }
}
