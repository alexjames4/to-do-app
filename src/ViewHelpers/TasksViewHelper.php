<?php

namespace ToDoApp\ViewHelpers;

class TasksViewHelper
{
    public static function getListOfTasks(array $tasks): string
    {
        $output = '';
        foreach($tasks as $task) {
            $output .=
                '<li class="list-group-item">'
                . $task->getName()
                . '<a href="/markTaskCompleted/' . $task->getId() . '" class="btn btn-outline-success">Done</a></li>';
        };
        return $output;
    }
}