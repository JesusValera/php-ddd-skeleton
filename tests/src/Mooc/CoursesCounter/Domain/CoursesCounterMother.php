<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\CoursesCounter\Domain;

use CodelyTv\Mooc\CoursesCounter\Domain\CoursesCounter;
use CodelyTv\Mooc\CoursesCounter\Domain\CoursesCounterUuid;
use CodelyTv\Mooc\CoursesCounter\Domain\CoursesCounterTotal;
use CodelyTv\Mooc\Shared\Domain\Course\CourseUuid;
use CodelyTv\Tests\Mooc\Courses\Domain\CourseUuidMother;
use CodelyTv\Tests\Shared\Domain\Repeater;

final class CoursesCounterMother
{
    public static function create(
        CoursesCounterUuid $id,
        CoursesCounterTotal $total,
        CourseUuid ...$existingCourses
    ): CoursesCounter {
        return new CoursesCounter($id, $total, ...$existingCourses);
    }

    public static function withOne(CourseUuid $courseId): CoursesCounter
    {
        return self::create(CoursesCounterUuidMother::random(), CoursesCounterTotalMother::one(), $courseId);
    }

    public static function incrementing(CoursesCounter $existingCounter, CourseUuid $courseId): CoursesCounter
    {
        return self::create(
            $existingCounter->id(),
            CoursesCounterTotalMother::create($existingCounter->total()->value() + 1),
            $courseId,
            ...array_values($existingCounter->existingCourses())
        );
    }

    public static function random(): CoursesCounter
    {
        return self::create(
            CoursesCounterUuidMother::random(),
            CoursesCounterTotalMother::random(),
            ...Repeater::random(CourseUuidMother::creator())
        );
    }
}
