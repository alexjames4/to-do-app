<?php

namespace ToDoApp\Entities;

class TaskEntity implements \JsonSerializable
{
    private int $id;
    private string $name;
    private string $description;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description
        ];
    }
}