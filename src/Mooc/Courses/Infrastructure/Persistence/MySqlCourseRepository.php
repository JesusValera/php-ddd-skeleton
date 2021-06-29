<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Courses\Infrastructure\Persistence;

use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Mooc\Courses\Domain\CourseUuid;
use Doctrine\ORM\EntityManager;

final class MySqlCourseRepository implements CourseRepository
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(Course $course): void
    {
        $this->entityManager->persist($course);
        $this->entityManager->flush($course);
    }

    public function search(CourseUuid $uuid): ?Course
    {
        return $this->entityManager->getRepository(Course::class)->find($uuid);
    }
}
