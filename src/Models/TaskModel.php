<?php

namespace ToDoApp\Models;

use ToDoApp\Entities\TaskEntity;

class TaskModel
{
    private \PDO $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getTasks()
    {
        $query = $this->db->prepare('SELECT `id`, `name`, `description`, `deadline`, `completed` FROM `tasks` WHERE `completed` = "0"');
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS, TaskEntity::class);
        return $query->fetchAll();
    }

    public function addNewTask(string $name)
    {
        $query = $this->db->prepare('INSERT INTO `tasks` (`name`) VALUES (?)');
        return $query->execute([$name]);
    }

    public function markTaskAsComplete(int $id)
    {
        $query = $this->db->prepare('UPDATE `tasks` SET `completed` = "1" WHERE `id` = ?');
        return $query->execute([$id]);
    }
}