<?php

namespace ToDoApp\ViewHelpers;

class TasksViewHelper
{
    public static function getListOfTasks(array $tasks): string
    {
        $output = '';
        foreach($tasks as $task) {
            $output .= '<li class="list-group-item">' . $task->getName() . '</li>';
        };
        return $output;
    }
}