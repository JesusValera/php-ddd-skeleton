<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Infrastructure;

use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserRepository;
use CodelyTv\Mooc\Users\Domain\UserEmail;

final class FileUserRepository implements UserRepository
{
    private const FILE_PATH = __DIR__ . '/courses';

    public function save(User $user): void
    {
        file_put_contents($this->fileName($user->email()), serialize($user));
    }

    public function search(UserEmail $email): ?User
    {
        return file_exists($this->fileName($email))
            ? unserialize(file_get_contents($this->fileName($email)), [User::class])
            : null;
    }

    private function fileName(UserEmail $email): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $email->value());
    }
}
