<?php

namespace Core\Domain\Entity\Traits;

trait MethodsMagicsTrait
{
    public function __get($property)
    {
        if(isset($this->{$property})){
            return $this->{$property};
        }

        $className = get_class($this);
        throw new Exception("Property {$property} not found in {$className} ");
    }

    public function getId() : string
    {
        return (string)$this->id;
    }
}