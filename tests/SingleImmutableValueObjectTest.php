<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Tests;

use Exception;
use NorseBlue\HandyProperties\Exceptions\PropertyNotMutableException;
use NorseBlue\ValueObjects\Tests\Helpers\SingleImmutableVO;

class SingleImmutableValueObjectTest extends TestCase
{
    /** @test */
    public function immutable_single_value_property_object_cannot_change_value(): void
    {
        $subject = new SingleImmutableVO();

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
