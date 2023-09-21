<?php
declare(strict_types=1);

use App\Controllers\CoursesAPIController;
use Slim\App;

return function (App $app) {

    $app->get('/', \ToDoApp\Controllers\TaskController::class);
    $app->post('/addNewTask', \ToDoApp\Controllers\NewTaskController::class);
    $app->get('/markTaskCompleted/{id}', \ToDoApp\Controllers\MarkTaskAsCompleteController::class);
};
