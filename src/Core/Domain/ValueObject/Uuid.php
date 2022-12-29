<?php

namespace Core\Domain\ValueObject;

use http\Exception\InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;
class Uuid
{
    protected string $value;
    public function __construct(string $value)
    {
        $this->ensureIsValid($value);
        $this->value = $value;
    }

    public static function random(): self
    {
        $uuid = RamseyUuid::uuid4() ->toString();
        return new self($uuid);
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function ensureIsValid(string $id)
    {
        if(!RamseyUuid::IsValid($id)) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $id));
        }
    }
}