<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Traits;

use NorseBlue\ValueObjects\Exceptions\InvalidValueException;

trait SimpleValueObjectBehavior
{
    /** @var mixed The objects's value */
    protected $value;

    /**
     * Create a new instance.
     *
     * @param mixed $value
     */
    public function __construct($value = null)
    {
        $this->mutatorValue($value);
    }

    /**
     * Unwrap the value object.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    final public static function unwrap($value)
    {
        if ($value instanceof self) {
            $value = $value->value;
        }

        return $value;
    }

    /**
     * Validate the given value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    abstract public function isValid($value): bool;

    /**
     * Value accessor.
     *
     * @return mixed
     */
    final public function accessorValue()
    {
        return $this->value;
    }

    /**
     * Value mutator.
     *
     * @param mixed $value
     */
    final public function mutatorValue($value): void
    {
        if (!$value instanceof static && !$this->isValid($value)) {
            throw new InvalidValueException('The given value is not valid.');
        }

        $this->value = static::unwrap($value);
    }

    /**
     * Converts the object to string by casting the value.
     *
     * @return string
     */
    final public function __toString(): string
    {
        return (string)$this->value;
    }
}