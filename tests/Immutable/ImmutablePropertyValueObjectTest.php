<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Tests\SingleProperty;

use Exception;
use NorseBlue\HandyProperties\Exceptions\PropertyNotMutableException;
use NorseBlue\ValueObjects\Tests\Helpers\Ispvo;
use NorseBlue\ValueObjects\Tests\TestCase;

class ImmutablePropertyValueObjectTest extends TestCase
{
    /** @test */
    public function immutable_single_value_property_object_cannot_change_value()
    {
        $subject = new Ispvo();

        try {
            $subject->value = 9;
        } catch (Exception $e) {
            $this->assertInstanceOf(PropertyNotMutableException::class, $e);
            $this->assertEquals('value', $e->getProperty());

            return;
        }

        $this->fail(PropertyNotMutableException::class . ' was not thrown.');
    }
}
