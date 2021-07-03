<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users;

use CodelyTv\Mooc\Users\Domain\UserRepository;
use PHPUnit\Framework\TestCase;

abstract class UsersModuleInfrastructureTestCase extends TestCase
{
    protected function repository(): UserRepository
    {
        return $this->service(UserRepository::class);
    }
}
