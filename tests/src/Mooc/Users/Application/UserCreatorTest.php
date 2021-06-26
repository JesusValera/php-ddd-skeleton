<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users\Application;

use CodelyTv\Mooc\Users\Application\UserCreator;
use CodelyTv\Tests\Mooc\Users\Application\Create\CreateUserRequestMother;
use CodelyTv\Tests\Mooc\Users\Domain\UserMother;
use CodelyTv\Tests\Mooc\Users\UsersModuleUnitTestCase;

final class UserCreatorTest extends UsersModuleUnitTestCase
{
    private UserCreator $creator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->creator = new UserCreator($this->repository);
    }

    /** @test */
    public function it_should_create_a_valid_user(): void
    {
        $userRequest = CreateUserRequestMother::random();
        $user = UserMother::fromRequest($userRequest);

        $this->shouldSave($user);

        $this->creator->__invoke($userRequest);
    }
}
