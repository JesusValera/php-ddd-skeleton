<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users;

use CodelyTv\Mooc\Users\Infrastructure\FileUserRepository;
use PHPUnit\Framework\TestCase;

abstract class UsersModuleInfrastructureTestCase extends TestCase
{
    protected function repository(): FileUserRepository
    {
        return new FileUserRepository();
    }
}
