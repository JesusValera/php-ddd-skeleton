<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users\Domain;

use CodelyTv\Mooc\Users\Domain\UserEmail;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class UserEmailTest extends TestCase
{
    /** @test */
    public function it_should_be_valid_email(): void
    {
        $email = new UserEmail('user@email.com');
        self::assertInstanceOf(UserEmail::class, $email);
    }

    /** @test */
    public function it_should_thrown_exception_invalid_email(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new UserEmail('jesus');
    }
}
