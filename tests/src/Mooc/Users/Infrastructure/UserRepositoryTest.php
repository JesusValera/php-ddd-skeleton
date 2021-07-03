<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users\Infrastructure;

use CodelyTv\Tests\Mooc\Users\Domain\UserEmailMother;
use CodelyTv\Tests\Mooc\Users\Domain\UserMother;
use CodelyTv\Tests\Mooc\Users\UsersModuleInfrastructureTestCase;

final class UserRepositoryTest extends UsersModuleInfrastructureTestCase
{
    /** @test */
    public function it_should_save_a_user(): void
    {
        $user = UserMother::random();

        $this->repository()->save($user);
    }

    /** @test */
    public function it_should_return_an_existing_user(): void
    {
        $user = UserMother::random();

        $this->repository()->save($user);

        $this->assertEquals($user, $this->repository()->search($user->email()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_user(): void
    {
        $this->assertNull($this->repository()->search(UserEmailMother::random()));
    }
}
