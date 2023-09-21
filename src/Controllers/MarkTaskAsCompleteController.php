<?php

namespace ToDoApp\Controllers;

use Psr\Http\Message\RequestInterface;
use Slim\Http\Interfaces\ResponseInterface;
use ToDoApp\Models\TaskModel;

class MarkTaskAsCompleteController
{
    private TaskModel $taskModel;

    public function __construct(TaskModel $taskModel)
    {
        $this->taskModel = $taskModel;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, $args): ResponseInterface
    {
        $this->taskModel->markTaskAsComplete($args['id']);
        return $response->withStatus(302)->withHeader('Location', '/');
    }
}