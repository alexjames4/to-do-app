<?php
declare(strict_types=1);

use App\Controllers\CoursesAPIController;
use Slim\App;

return function (App $app) {

    $app->get('/tasks', \ToDoApp\Controllers\TaskController::class);
};
