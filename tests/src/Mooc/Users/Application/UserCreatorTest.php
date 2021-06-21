<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users\Application;

use CodelyTv\Mooc\Users\Application\CreateUserRequest;
use CodelyTv\Mooc\Users\Application\UserCreator;
use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Mooc\Users\Domain\UserRepository;
use PHPUnit\Framework\TestCase;

final class UserCreatorTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_user(): void
    {
        $repository = $this->createMock(UserRepository::class);
        $creator = new UserCreator($repository);

        $name = 'some-name';
        $email = 'email@mail.com';

        $user = new User(
            new UserName($name),
            new UserEmail($email)
        );

        $repository->method('save')->with($user);

        $creator->__invoke(new CreateUserRequest($name, $email));
    }
}
