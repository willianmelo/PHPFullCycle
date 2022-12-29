<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodsMagicsTrait;
use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;

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