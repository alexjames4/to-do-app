<?php

namespace ToDoApp\Controllers;

use Psr\Http\Message\RequestInterface;
use Slim\Http\Interfaces\ResponseInterface;
use Slim\Views\PhpRenderer;
use ToDoApp\Models\TaskModel;

class CompletedTaskController
{
    private TaskModel $taskModel;
    private PhpRenderer $views;

    public function __construct(TaskModel $taskModel, PhpRenderer $views)
    {
        $this->taskModel = $taskModel;
        $this->views = $views;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $tasks = $this->taskModel->getCompletedTasks();

        return $this->views->render($response, "completedTasks.php", ['tasks' => $tasks]);
    }
}