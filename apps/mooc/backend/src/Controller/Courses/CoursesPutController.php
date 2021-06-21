<?php

declare(strict_types=1);

namespace CodelyTv\Apps\Mooc\Backend\Controller\Courses;

use CodelyTv\Mooc\Courses\Application\CourseCreator;
use CodelyTv\Mooc\Courses\Application\CreateCourseRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CoursesPutController
{
    private CourseCreator $courseCreator;

    public function __construct(CourseCreator $courseCreator)
    {
        $this->courseCreator = $courseCreator;
    }

    public function __invoke(string $uuid, Request $request): Response
    {
        $name = $request->get('name');
        $duration = $request->get('duration');

        $this->courseCreator->__invoke(new CreateCourseRequest($uuid, $name, $duration));

        return new Response('', Response::HTTP_CREATED);
    }
}
