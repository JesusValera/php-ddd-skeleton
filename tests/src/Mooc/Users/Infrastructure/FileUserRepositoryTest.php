<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users\Infrastructure;

use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Mooc\Users\Infrastructure\FileUserRepository;
use PHPUnit\Framework\TestCase;

final class FileUserRepositoryTest extends TestCase
{
    /** @test */
    public function it_should_save_a_user(): void
    {
        $repository = new FileUserRepository();
        $user = new User(
            new UserName('name'),
            new UserEmail('email@mail.com')
        );

        $repository->save($user);
    }

    /** @test */
    public function it_should_return_an_existing_user(): void
    {
        $repository = new FileUserRepository();
        $user = new User(
            new UserName('name'),
            new UserEmail('email@mail.com')
        );

        $repository->save($user);

        $this->assertEquals($user, $repository->search(new UserEmail('email@mail.com')));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_user(): void
    {
        $repository = new FileUserRepository();

        $this->assertNull($repository->search(new UserEmail('non-existing-email@mail.com')));
    }
}
