<?php

declare(strict_types=1);

namespace CodelyTv\Apps\Mooc\Backend\Controller\Users;

use CodelyTv\Mooc\Users\Application\CreateUserRequest;
use CodelyTv\Mooc\Users\Application\UserCreator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class UsersPostController
{
    private UserCreator $creator;

    public function __construct(UserCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(Request $request): Response
    {
        $name = $request->get('name');
        $email = $request->get('email');

        $this->creator->__invoke(new CreateUserRequest($name, $email));

        return new Response('', Response::HTTP_CREATED);
    }
}
