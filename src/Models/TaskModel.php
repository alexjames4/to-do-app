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

    public function getUncompletedTasks()
    {
        $query = $this->db->prepare('SELECT `id`, `name`, `description`, `deadline`, `completed` FROM `tasks` WHERE `completed` = "0"');
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS, TaskEntity::class);
        return $query->fetchAll();
    }

    public function getCompletedTasks()
    {
        $query = $this->db->prepare('SELECT `id`, `name`, `description`, `deadline`, `completed` FROM `tasks` WHERE `completed` = "1"');
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

    public function markTaskAsIncomplete(int $id)
    {
        $query = $this->db->prepare('UPDATE `tasks` SET `completed` = "0" WHERE `id` = ?');
        return $query->execute([$id]);
    }

    public function editIncompleteTask(int $id, string $name)
    {
        $query = $this->db->prepare('UPDATE `tasks` SET `name` = :name WHERE `id` = :id');
        return $query->execute(['name' => $name, 'id' => $id]);
    }

    public function getTaskById(int $id)
    {
        $query = $this->db->prepare('SELECT `id`, `name`, `description`, `deadline`, `completed` FROM `tasks` WHERE `id` = ?');
        $query->execute([$id]);
        $query->setFetchMode(\PDO::FETCH_CLASS, TaskEntity::class);
        return $query->fetch();
    }
}