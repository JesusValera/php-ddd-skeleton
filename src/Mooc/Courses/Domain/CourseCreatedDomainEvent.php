<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Courses\Domain;

use CodelyTv\Shared\Domain\Bus\DomainEvent;

final class CourseCreatedDomainEvent extends DomainEvent
{
    private string $name;
    private string $duration;

    public function __construct(string $uuid, string $name, string $duration)
    {
        parent::__construct($uuid);

        $this->name = $name;
        $this->duration = $duration;
    }

    public static function eventName(): string
    {
        return 'course.created';
    }

    public function plainBody(): array
    {
        return [
            'name' => $this->name,
            'duration' => $this->duration,
        ];
    }
}
