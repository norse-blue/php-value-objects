<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Traits;

use NorseBlue\HandyProperties\Exceptions\PropertyNotMutableException;

trait SingleImmutableValueObjectBehavior
{
    use SingleValueObjectBehavior;

    /**
     * Override property mutator to prevent mutability.
     */
    final public function __set(string $key, mixed $value): void
    {
        throw new PropertyNotMutableException(
            $key,
            "The '${key}' property is immutable, cannot set the value '${value}'."
        );
    }
}
