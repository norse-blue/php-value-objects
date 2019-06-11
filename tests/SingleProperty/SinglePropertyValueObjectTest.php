<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Tests\SingleProperty;

use Exception;
use NorseBlue\ValueObjects\Exceptions\InvalidValueException;
use NorseBlue\ValueObjects\Exceptions\PropertyNotFoundException;
use NorseBlue\ValueObjects\SingleProperty\SinglePropertyValueObject;
use NorseBlue\ValueObjects\Tests\Helpers\Spvo;
use NorseBlue\ValueObjects\Tests\TestCase;

class SinglePropertyValueObjectTest extends TestCase
{
    /** @test */
    public function single_property_value_object_can_be_created_with_default_value()
    {
        $subject = new Spvo();

        $this->assertInstanceOf(SinglePropertyValueObject::class, $subject);
        $this->assertEquals(null, $subject->value);
    }

    /** @test */
    public function single_property_value_object_equals_value()
    {
        $subject = new Spvo(13);

        $this->assertEquals(13, $subject->value);
        $this->assertTrue($subject->equals(13));
        $this->assertTrue($subject->equals($subject));
        $this->assertTrue($subject->equals($subject->value));
    }

    /** @test */
    public function single_property_value_object_equals_object()
    {
        $subject = new Spvo(13);
        $other = new Spvo(13);

        $this->assertEquals(13, $subject->value);
        $this->assertEquals(13, $other->value);
        $this->assertTrue($subject->equals($other));
    }

    /** @test */
    public function single_property_value_object_is_commutative()
    {
        $subject = new Spvo(13);
        $other = new Spvo(13);

        $this->assertTrue($subject->equals($other));
        $this->assertTrue($other->equals($subject));
    }

    /** @test */
    public function single_property_value_object_can_be_unwrapped()
    {
        $subject = new Spvo(13);

        $this->assertEquals(13, Spvo::unwrap(13));
        $this->assertEquals(13, Spvo::unwrap($subject));
    }

    /** @test */
    public function single_property_value_object_isset_works_appropriately()
    {
        $subject = new Spvo();
        $other = new Spvo(13);

        $this->assertFalse(isset($subject->value));
        $this->assertTrue(isset($other->value));
    }

    /** @test */
    public function single_property_value_object_isset_throws_exception_when_property_non_existent()
    {
        $subject = new Spvo(13);

        try {
            isset($subject->non_existent);
        } catch (Exception $e) {
            $this->assertInstanceOf(PropertyNotFoundException::class, $e);

            return;
        }

        $this->fail(PropertyNotFoundException::class . ' was not thrown.');
    }

    /** @test */
    public function single_property_value_object_throws_error_when_value_is_invalid()
    {
        try {
            new Spvo(3);
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidValueException::class, $e);

            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }

    /** @test */
    public function single_property_value_object_is_transformed_into_string()
    {
        $subject = new Spvo();
        $other = new Spvo(13);

        $subject_str = (string)$subject;
        $other_str = (string)$other;

        $this->assertIsString($subject_str);
        $this->assertEquals('', $subject_str);
        $this->assertIsString($other_str);
        $this->assertEquals('13', $other_str);
    }

    /** @test */
    public function single_property_value_object_cannot_get_non_existent_property()
    {
        $subject = new Spvo();

        try {
            $subject->non_existent;
        } catch (Exception $e) {
            $this->assertInstanceOf(PropertyNotFoundException::class, $e);
            $this->assertEquals('non_existent', $e->getProperty());

            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }

    /** @test */
    public function single_property_value_object_cannot_set_non_existent_property()
    {
        $subject = new Spvo();

        try {
            $subject->non_existent = 'new value';
        } catch (Exception $e) {
            $this->assertInstanceOf(PropertyNotFoundException::class, $e);
            $this->assertEquals('non_existent', $e->getProperty());

            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }

    /** @test */
    public function single_property_value_object_can_change_value()
    {
        $subject = new Spvo();

        $subject->value = 13;

        $this->assertEquals(13, $subject->value);
    }
}
