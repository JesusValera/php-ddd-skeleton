<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users\Application\Create;

use CodelyTv\Mooc\Users\Application\CreateUserRequest;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Tests\Mooc\Users\Domain\UserEmailMother;
use CodelyTv\Tests\Mooc\Users\Domain\UserNameMother;

final class CreateUserRequestMother
{
    public static function create(
        UserName $name,
        UserEmail $email
    ): CreateUserRequest {
        return new CreateUserRequest($name->value(), $email->value());
    }

    public static function random(): CreateUserRequest
    {
        return self::create(
            UserNameMother::random(),
            UserEmailMother::random()
        );
    }
}
