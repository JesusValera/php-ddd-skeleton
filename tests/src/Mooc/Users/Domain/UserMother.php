<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users\Domain;

use CodelyTv\Mooc\Users\Application\CreateUserRequest;
use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;

final class UserMother
{
    public static function create(UserName $name, UserEmail $email): User
    {
        return new User($name, $email);
    }

    public static function fromRequest(CreateUserRequest $request): User
    {
        return self::create(
            UserNameMother::create($request->name()),
            UserEmailMother::create($request->email())
        );
    }

    public static function random(): User
    {
        return self::create(UserNameMother::random(), UserEmailMother::random());
    }
}
