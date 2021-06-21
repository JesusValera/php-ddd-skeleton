<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Application;

use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserRepository;

final class UserCreator
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateUserRequest $request)
    {
        $name = new UserName($request->name());
        $email = new UserEmail($request->email());

        $course = new User($name, $email);

        $this->repository->save($course);
    }
}
