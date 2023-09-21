<?php

namespace ToDoApp\ViewHelpers;

use ToDoApp\Entities\TaskEntity;

class TasksViewHelper
{
    public static function getListOfUncompletedTasks(array $tasks): string
    {
        $output = '';
        foreach($tasks as $task) {
            $output .=
                '<li class="list-group-item d-flex justify-content-between">'
                . $task->getName()
                . '<div class="container">
                        <a href="/' . $task->getId() . '" class="btn btn-outline-primary">Edit</a><a href="/markTaskCompleted/' . $task->getId() . '" class="btn btn-outline-success">Done</a>
                   </div>
                   </li>';
        };
        return $output;
    }
    public static function getListOfCompletedTasks(array $tasks): string
    {
        $output = '';
        foreach($tasks as $task) {
            $output .=
                '<li class="list-group-item d-flex justify-content-between">'
                . $task->getName()
                . '<a href="/markTaskAsIncomplete/' . $task->getId() . '" class="btn btn-outline-danger">Undo</a></li>';
        };
        return $output;
    }

    public static function handleTaskInputValue(?TaskEntity $editingTask): ?string
    {
        if ($editingTask != null) {
            $output = $editingTask->getName();
        } else {
            $output = '';
        }
        return $output;
    }
}