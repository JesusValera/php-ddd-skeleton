<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\CoursesCounter\Domain;

use CodelyTv\Mooc\Shared\Domain\Course\CourseUuid;
use CodelyTv\Shared\Domain\Aggregate\AggregateRoot;

use function Lambdish\Phunctional\reindex;

final class CoursesCounter extends AggregateRoot
{
    private CoursesCounterTotal $total;
    private array $existingCourses;
    private CoursesCounterUuid $uuid;

    public function __construct(CoursesCounterUuid $uuid, CoursesCounterTotal $total, CourseUuid ...$existingCourses)
    {
        $this->uuid = $uuid;
        $this->total = $total;
        $this->existingCourses = reindex($this->valueExtractor(), $existingCourses);
    }

    public static function initialize(CoursesCounterUuid $id): self
    {
        return new self($id, CoursesCounterTotal::initialize());
    }

    public function id(): CoursesCounterUuid
    {
        return $this->uuid;
    }

    public function total(): CoursesCounterTotal
    {
        return $this->total;
    }

    public function existingCourses(): array
    {
        return $this->existingCourses;
    }

    public function increment(CourseUuid $courseId): void
    {
        $this->total = $this->total->increment();
        $this->existingCourses[] = $courseId;

        $this->record(new CoursesCounterIncrementedDomainEvent($this->id()->value(), $this->total()->value()));
    }

    public function hasIncremented(CourseUuid $courseId): bool
    {
        return isset($this->existingCourses()[$courseId->value()]);
    }

    private function valueExtractor(): callable
    {
        return static function (CourseUuid $id) {
            return $id->value();
        };
    }
}
