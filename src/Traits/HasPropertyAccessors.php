<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Traits;

use NorseBlue\ValueObjects\Exceptions\PropertyNotFoundException;

/**
 * Handles property accessors.
 */
trait HasPropertyAccessors
{
    /**
     * Magic accessor.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function __get(string $key)
    {
        if ($this->hasAccessor($key, $accessor)) {
            return $this->$accessor();
        }

        throw new PropertyNotFoundException($key, 'The property or an accessor could not be found.');
    }

    /**
     * Magic variable set check.
     *
     * @param string $key
     *
     * @return bool
     */
    public function __isset(string $key): bool
    {
        if (!$this->hasAccessor($key, $accessor)) {
            throw new PropertyNotFoundException($key, 'The property was not found or is not accessible.');
        }

        $value = $this->$accessor();

        return isset($value);
    }

    /**
     * Checks if an accessor exists for the key.
     *
     * @param string $key
     * @param string|null $accessor optional Output parameter to get the accessor name.
     *
     * @return bool
     */
    protected function hasAccessor(string $key, ?string &$accessor = null): bool
    {
        $studly_key = str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $key)));
        $accessor = 'get' . $studly_key . 'Property';

        return method_exists($this, $accessor);
    }
}
