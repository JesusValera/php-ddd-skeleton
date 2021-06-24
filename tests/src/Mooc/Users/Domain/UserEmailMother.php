<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users\Domain;

use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Tests\Shared\Domain\EmailMother;

final class UserEmailMother
{
    public static function create(string $value): UserEmail
    {
        return new UserEmail($value);
    }

    public static function random(): UserEmail
    {
        return self::create(EmailMother::random());
    }
}
