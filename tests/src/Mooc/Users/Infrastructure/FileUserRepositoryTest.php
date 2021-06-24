<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users\Infrastructure;

use CodelyTv\Mooc\Users\Infrastructure\FileUserRepository;
use CodelyTv\Tests\Mooc\Users\Domain\UserEmailMother;
use CodelyTv\Tests\Mooc\Users\Domain\UserMother;
use PHPUnit\Framework\TestCase;

final class FileUserRepositoryTest extends TestCase
{
    /** @test */
    public function it_should_save_a_user(): void
    {
        $repository = new FileUserRepository();
        $user = UserMother::random();

        $repository->save($user);
    }

    /** @test */
    public function it_should_return_an_existing_user(): void
    {
        $repository = new FileUserRepository();
        $user = UserMother::random();

        $repository->save($user);

        $this->assertEquals($user, $repository->search($user->email()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_user(): void
    {
        $repository = new FileUserRepository();

        $this->assertNull($repository->search(UserEmailMother::random()));
    }
}