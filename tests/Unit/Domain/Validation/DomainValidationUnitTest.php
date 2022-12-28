<?php

namespace Tests\Unit\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\TestCase;
use Core\Domain\Validation\DomainValidation;

class DomainValidationUnitTest extends TestCase
{
    public function testNotNull()
    {
        try {
            $value = '';

            DomainValidation::notNull($value);

            $this->fail();
        }catch (\Throwable $th)
        {
            $this->assertInstanceOf(EntityValidationException::class, $th);
        }
    }

    public function testNotNullCustomMessageException()
    {
        try {
            $value = '';
            $customMessageException = "custom message exception";

            DomainValidation::notNull($value, );

            $this->fail();
        }catch (\Throwable $th)
        {
            $this->assertInstanceOf(EntityValidationException::class, $th, $customMessageException);
        }
    }
}