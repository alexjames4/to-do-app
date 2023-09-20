<?php

namespace ToDoApp\Entities;

class TaskEntity implements \JsonSerializable
{
    private int $id;
    private string $name;
    private string $description;

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description
        ];
    }
}