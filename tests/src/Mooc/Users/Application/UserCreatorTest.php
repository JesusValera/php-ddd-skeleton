<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users\Application;

use CodelyTv\Mooc\Users\Application\UserCreator;
use CodelyTv\Mooc\Users\Domain\UserRepository;
use CodelyTv\Tests\Mooc\Users\Application\Create\CreateUserRequestMother;
use CodelyTv\Tests\Mooc\Users\Domain\UserMother;
use PHPUnit\Framework\TestCase;

final class UserCreatorTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_user(): void
    {
        $repository = $this->createMock(UserRepository::class);
        $creator = new UserCreator($repository);

        $userRequest = CreateUserRequestMother::random();
        $user = UserMother::fromRequest($userRequest);

        $repository->method('save')->with($user);

        $creator->__invoke($userRequest);
    }
}
