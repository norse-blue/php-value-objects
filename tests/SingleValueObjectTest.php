<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Tests;

use Exception;
use NorseBlue\HandyProperties\Exceptions\PropertyNotAccessibleException;
use NorseBlue\HandyProperties\Exceptions\PropertyNotMutableException;
use NorseBlue\ValueObjects\Exceptions\InvalidValueException;
use NorseBlue\ValueObjects\SingleValueObject;
use NorseBlue\ValueObjects\Tests\Helpers\SingleVO;

class SingleValueObjectTest extends TestCase
{
    /** @test */
    public function single_property_value_object_can_be_created_with_default_value(): void
    {
        $subject = new SingleVO();

        $this->assertInstanceOf(SingleValueObject::class, $subject);
        $this->assertEquals(null, $subject->value);
    }

    /** @test */
    public function single_property_value_object_can_be_unwrapped(): void
    {
        $subject = new SingleVO(13);

        $this->assertEquals(13, SingleVO::unwrap(13));
        $this->assertEquals(13, SingleVO::unwrap($subject));
    }

    /** @test */
    public function single_property_value_object_can_change_value(): void
    {
        $subject = new SingleVO();

        $subject->value = 13;

        $this->assertEquals(13, $subject->value);
    }

    /** @test */
    public function single_property_value_object_cannot_get_non_existent_property(): void
    {
        $subject = new SingleVO();

        try {
            $subject->non_existent;
        } catch (Exception $e) {
            $this->assertInstanceOf(PropertyNotAccessibleException::class, $e);
            $this->assertEquals('non_existent', $e->getProperty());

            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }

    /** @test */
    public function single_property_value_object_cannot_set_non_existent_property(): void
    {
        $subject = new SingleVO();

        try {
            $subject->non_existent = 'new value';
        } catch (Exception $e) {
            $this->assertInstanceOf(PropertyNotMutableException::class, $e);
            $this->assertEquals('non_existent', $e->getProperty());

            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }

    /** @test */
    public function single_property_value_object_equals_object(): void
    {
        $subject = new SingleVO(13);
        $other = new SingleVO(13);

        $this->assertEquals(13, $subject->value);
        $this->assertEquals(13, $other->value);
    }

    /** @test */
    public function single_property_value_object_equals_value(): void
    {
        $subject = new SingleVO(13);

        $this->assertEquals(13, $subject->value);
    }

    /** @test */
    public function single_property_value_object_is_transformed_into_string(): void
    {
        $subject = new SingleVO();
        $other = new SingleVO(13);

        $subject_str = (string)$subject;
        $other_str = (string)$other;

        $this->assertIsString($subject_str);
        $this->assertEquals('', $subject_str);
        $this->assertIsString($other_str);
        $this->assertEquals('13', $other_str);
    }

    /** @test */
    public function single_property_value_object_isset_throws_exception_when_property_non_existent(): void
    {
        $subject = new SingleVO(13);

        try {
            isset($subject->non_existent);
        } catch (Exception $e) {
            $this->assertInstanceOf(PropertyNotAccessibleException::class, $e);

            return;
        }

        $this->fail(PropertyNotAccessibleException::class . ' was not thrown.');
    }

    /** @test */
    public function single_property_value_object_isset_works_appropriately(): void
    {
        $subject = new SingleVO();
        $other = new SingleVO(13);

        $this->assertFalse(isset($subject->value));
        $this->assertTrue(isset($other->value));
    }

    /** @test */
    public function single_property_value_object_throws_error_when_value_is_invalid(): void
    {
        try {
            new SingleVO(3);
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidValueException::class, $e);

            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }
}
