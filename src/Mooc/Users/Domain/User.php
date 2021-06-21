<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Domain;

final class User
{
    private UserName $name;
    private UserEmail $email;

    public function __construct(UserName $name, UserEmail $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }
}
