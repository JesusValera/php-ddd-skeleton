<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Courses\Application;

final class CreateCourseRequest
{
    private string $uuid;
    private string $name;
    private string $duration;

    public function __construct(string $uuid, string $name, string $duration)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->duration = $duration;
    }

    public function uuid(): string
    {
        return $this->uuid;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function duration(): string
    {
        return $this->duration;
    }
}
