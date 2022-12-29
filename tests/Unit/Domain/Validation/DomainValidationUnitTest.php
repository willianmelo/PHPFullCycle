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

            DomainValidation::notNull($value, $customMessageException);

            $this->fail();
        }catch (\Throwable $th)
        {
            $this->assertInstanceOf(EntityValidationException::class, $th, $customMessageException);
        }
    }

    public function testStrMaxLenght()
    {
        try{
            $value = 'Test';
            $customMessage = "custom message";

            DomainValidation::strMaxLenght($value, 3, $customMessage);

            $this->fail();
        }catch (\Throwable $th)
        {
            $this->assertInstanceOf(EntityValidationException::class, $th, $customMessage);
        }
    }

    public function testStrMinLenght()
    {
        try{
            $value = 'Test';
            $customMessage = "custom message";

            DomainValidation::strMinLenght($value, 8, $customMessage);

            $this->fail();
        }catch (\Throwable $th)
        {
            $this->assertInstanceOf(EntityValidationException::class, $th, $customMessage);
        }
    }
    public function testStrCanNullAndMaxLenght()
    {
        try{
            $value = 'Test';
            $customMessage = "custom message";

            DomainValidation::strCanNullAndMaxLenght($value, 3, $customMessage);

            $this->fail();
        }catch (\Throwable $th)
        {
            $this->assertInstanceOf(EntityValidationException::class, $th, $customMessage);
        }
    }
}