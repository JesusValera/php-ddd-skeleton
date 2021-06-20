<?php

declare(strict_types = 1);

namespace CodelyTv\Shared\Domain;

interface CurrentTime
{
    public function getDate(): string;
}
