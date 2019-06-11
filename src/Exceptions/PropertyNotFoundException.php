<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Exceptions;

use OutOfBoundsException;
use Throwable;

/**
 * Exception thrown when a property could not be found.
 */
final class PropertyNotFoundException extends OutOfBoundsException
{
    /** @var string The property that was not found. */
    protected $property;

    /**
     * Create a new instance.
     *
     * @param string $property
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(string $property = '', string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->property = $property;
    }

    /**
     * Get the property value.
     *
     * @return string
     */
    public function getProperty(): string
    {
        return $this->property;
    }
}
