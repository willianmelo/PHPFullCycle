<?php

namespace Core\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;

class DomainValidation
{
    public static function notNull(string $value, string $exceptMessage = '') : void
    {
        if(empty($value)){
            throw new EntityValidationException($exceptMessage ?? "Should not be empty");
        }
    }
}