<?php

namespace ToDoApp\Controllers;


use Psr\Http\Message\RequestInterface;
use Slim\Http\Interfaces\ResponseInterface;
use Slim\Views\PhpRenderer;
use ToDoApp\Models\TaskModel;

class IncompletedTaskController
{
    private TaskModel $taskModel;
    private PhpRenderer $views;

    public function __construct(TaskModel $taskModel, PhpRenderer $views)
    {
        $this->taskModel = $taskModel;
        $this->views= $views;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, $args): ResponseInterface
    {
        $task = null;
        if (isset($args['id'])) {
          $task = $this->taskModel->getTaskById($args['id']);
        }
        $tasks = $this->taskModel->getUncompletedTasks();

        return $this->views->render($response, "tasks.php", ['tasks' => $tasks, 'editingTask' => $task]);
    }
}