<?php

namespace ToDoApp\Entities;

class TaskEntity implements \JsonSerializable
{
    private int $id;
    private string $name;
    private ?string $description;

    private ?string $deadline;
    private ?bool $completed;


    public function getName(): string
    {
        return $this->name;
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