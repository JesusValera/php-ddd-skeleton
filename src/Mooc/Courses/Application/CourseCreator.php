<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Courses\Application;

use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseDuration;
use CodelyTv\Mooc\Courses\Domain\CourseName;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Mooc\Courses\Domain\CourseUuid;

final class CourseCreator
{
    private CourseRepository $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateCourseRequest $request)
    {
        $uuid = new CourseUuid($request->uuid());
        $name = new CourseName($request->name());
        $duration = new CourseDuration($request->duration());

        $course = new Course($uuid, $name, $duration);

        $this->repository->save($course);
    }
}
