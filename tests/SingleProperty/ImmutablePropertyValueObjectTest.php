<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Tests\SingleProperty;

use Exception;
use NorseBlue\ValueObjects\Exceptions\ImmutablePropertyException;
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
            $this->assertInstanceOf(ImmutablePropertyException::class, $e);
            $this->assertEquals('value', $e->getProperty());

            return;
        }

        $this->fail(ImmutablePropertyException::class . ' was not thrown.');
    }
}
