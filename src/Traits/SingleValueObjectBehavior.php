<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Traits;

use NorseBlue\HandyProperties\Traits\HasPropertyAccessors;
use NorseBlue\HandyProperties\Traits\HasPropertyMutators;
use NorseBlue\ValueObjects\Exceptions\InvalidValueException;

trait SingleValueObjectBehavior
{
    use HasPropertyAccessors;
    use HasPropertyMutators;

    protected mixed $value;

    /**
     * Create a new instance.
     */
    public function __construct(mixed $value = null)
    {
        $this->mutatorValue($value);
    }

    /**
     * Unwrap the value object.
     */
    final public static function unwrap(mixed $value): mixed
    {
        if ($value instanceof self) {
            $value = $value->value;
        }

        return $value;
    }

    /**
     * Converts the object to string by casting the value.
     */
    final public function __toString(): string
    {
        return (string)$this->value;
    }

    /**
     * Validate the given value.
     */
    abstract public function isValid(mixed $value): bool;

    /**
     * Value accessor.
     */
    final protected function accessorValue(): mixed
    {
        return $this->value;
    }

    /**
     * Value mutator.SingleValueObject
     */
    final protected function mutatorValue(mixed $value): void
    {
        if (! $value instanceof static && ! $this->isValid($value)) {
            throw new InvalidValueException('The given value is not valid.');
        }

        $this->value = static::unwrap($value);
    }
}
