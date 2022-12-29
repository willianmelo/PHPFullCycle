<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodsMagicsTrait;
use Core\Domain\Validation\DomainValidation;
use Core\Domain\ValueObject\Uuid;

class Category
{
    use MethodsMagicsTrait;
    protected $id;
    protected $name;
    protected $description;
    protected $isActive;

    public function __construct(string $name,
                                Uuid|string $id = '',
                                string $description = '',
                                bool $isActive = true)
    {
        $this->id = $id ? new Uuid($id) : Uuid::random();

        $this->isActive = $isActive;
        $this->description = $description;
        $this->name = $name;
        $this->validate();
    }

    public function activate() : void
    {
        $this->isActive = true;
    }

    public function disable() : void
    {
        $this->isActive = false;
    }

    public function update(string $name, string $description = '')
    {
        $this->validate();

        $this->name = $name;
        $this->description = $description;
    }

    public function validate(): void
    {
        DomainValidation::strMinLenght($this->name, 2);
        DomainValidation::strMaxLenght($this->name);
        DomainValidation::strCanNullAndMaxLenght($this->description);
    }
}