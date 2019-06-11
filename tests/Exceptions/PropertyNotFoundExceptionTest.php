<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Tests\Exceptions;

use NorseBlue\ValueObjects\Exceptions\PropertyNotFoundException;
use NorseBlue\ValueObjects\Tests\TestCase;

class PropertyNotFoundExceptionTest extends TestCase
{
    /** @test */
    public function can_get_property_from_property_not_found_exception()
    {
        $subject = new PropertyNotFoundException('the_property');

        $this->assertEquals('the_property', $subject->getProperty());
    }
}
