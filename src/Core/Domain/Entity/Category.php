<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodsMagicsTrait;

class Category
{
    use MethodsMagicsTrait;
    protected $id;
    protected $name;
    protected $description;
    protected $isActive;

    public function __construct(string $name,
                                string $id = '',
                                string $description = '',
                                bool $isActive = true)
    {
        $this->isActive = $isActive;
        $this->description = $description;
        $this->name = $name;
        $this->id = $id;
    }

    public function activate() : void
    {
        $this->isActive = true;
    }

    public function disable() : void
    {
        $this->isActive = false;
    }
}