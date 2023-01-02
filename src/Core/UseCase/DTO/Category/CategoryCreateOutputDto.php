<?php

namespace Core\UseCase\DTO\Category;

class CategoryCreateOutputDto
{
    public string $id;
    public string $name;
    public string $description;

    public bool $isActive;

    public function __construct(string $id, string $name, string $description = '', bool $isActive = true)
    {
        $this->name = $name;
        $this->description = $description;
        $this->isActive = $isActive;
        $this->id = $id;
    }
}