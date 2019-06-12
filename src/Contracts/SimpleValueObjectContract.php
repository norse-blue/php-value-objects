<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Contracts;

/**
 * @property mixed $value
 */
interface SimpleValueObjectContract
{
    /**
     * Unwrap the value object.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public static function unwrap($value);

    /**
     * Validate the given value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function isValid($value): bool;

    /**
     * Value accessor.
     *
     * @return mixed
     */
    public function getValueProperty();

    /**
     * Value mutator.
     *
     * @param mixed $value
     */
    public function changeValueProperty($value): void;
}
