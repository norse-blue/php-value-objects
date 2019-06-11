<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Tests\Exceptions;

use NorseBlue\ValueObjects\Exceptions\ImmutablePropertyException;
use NorseBlue\ValueObjects\Tests\TestCase;

class ImmutablePropertyExceptionTest extends TestCase
{
    /** @test */
    public function can_get_property_from_immutable_property_exception()
    {
        $subject = new ImmutablePropertyException('the_property');

        $this->assertEquals('the_property', $subject->getProperty());
    }
}
