<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users;

use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserRepository;
use PHPUnit\Framework\TestCase;

abstract class UsersModuleUnitTestCase extends TestCase
{
    private UserRepository $repository;

    protected function shouldSave(User $user): void
    {
        $this->repository()->method('save')->with($user);
    }

    protected function repository()
    {
        if (!isset($this->repository)) {
            $this->repository = $this->createMock(UserRepository::class);
        }

        return $this->repository;
    }
}
