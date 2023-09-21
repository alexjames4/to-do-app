<?php
declare(strict_types=1);

use App\Controllers\CoursesAPIController;
use Slim\App;

return function (App $app) {

    $app->get('/', \ToDoApp\Controllers\IncompletedTaskController::class);
    $app->post('/addNewTask', \ToDoApp\Controllers\NewTaskController::class);
    $app->get('/markTaskCompleted/{id}', \ToDoApp\Controllers\MarkTaskAsCompleteController::class);
    $app->get('/completedTasks', \ToDoApp\Controllers\CompletedTaskController::class);
    $app->get('/markTaskAsIncomplete/{id}', \ToDoApp\Controllers\MarkTaskAsIncomplete::class);
    $app->get('/{id}', \ToDoApp\Controllers\IncompletedTaskController::class);
};
