<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Domain;

use CodelyTv\Mooc\Shared\Domain\ValueObject\StringValueObject;
use InvalidArgumentException;

final class UserEmail extends StringValueObject
{
    public function __construct(string $value)
    {
        $this->assertIsValidEmail($value);

        parent::__construct($value);
    }

    private function assertIsValidEmail(string $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf('<%s> is not a valid email address %s.', $value, self::class)
            );
        }
    }
}
