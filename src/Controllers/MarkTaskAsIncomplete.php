<?php

namespace ToDoApp\Controllers;

use Psr\Http\Message\RequestInterface;
use Slim\Http\Interfaces\ResponseInterface;
use ToDoApp\Models\TaskModel;

class MarkTaskAsIncomplete
{
    private TaskModel $taskModel;

    public function __construct(TaskModel $taskModel)
    {
        $this->taskModel = $taskModel;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, $args): ResponseInterface
    {
        $this->taskModel->markTaskAsIncomplete($args['id']);
        return $response->withStatus(302)->withHeader('Location', '/completedTasks');
    }
}