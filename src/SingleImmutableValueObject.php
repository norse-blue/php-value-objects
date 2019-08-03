<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects;

use NorseBlue\ValueObjects\Traits\SingleImmutableValueObjectBehavior;

abstract class SingleImmutableValueObject extends SingleValueObject
{
    use SingleImmutableValueObjectBehavior;
}
