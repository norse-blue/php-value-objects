---
layout: default
title: Examples
nav_order: 3
permalink: /examples
---

# Examples
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

The following examples are equivalent, each having its caveats.

## Example with inheritance

### Single Value Object 

```php
<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Examples;

use NorseBlue\ValueObjects\SingleValueObject;

class MyObject extends SingleValueObject
{
    /**
     * Validate the given value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function isValid($value): bool
    {
        return is_int($value);
    }
}
```

### Single Immutable Value Object 

```php
<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Examples;

use NorseBlue\ValueObjects\SingleImmutableValueObject;

class MyObject extends SingleImmutableValueObject
{
    /**
     * Validate the given value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function isValid($value): bool
    {
        return is_int($value);
    }
}

```

## Example with composition

### Single Value Object 

```php
<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Examples;

use NorseBlue\ValueObjects\Contracts\SingleValueObject as SingleValueObjectContract;
use NorseBlue\ValueObjects\Traits\SingleValueObjectBehavior;

class MyObject implements SingleValueObjectContract
{
    use SingleValueObjectBehavior;

    /**
     * Validate the given value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function isValid($value): bool
    {
        return is_int($value);
    }
}
```

### Single Immutable Value Object 

```php
<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Examples;

use NorseBlue\ValueObjects\Contracts\SingleValueObject as SingleValueObjectContract;
use NorseBlue\ValueObjects\Traits\SingleImmutableValueObjectBehavior;

class MyObject implements SingleValueObjectContract
{
    use SingleImmutableValueObjectBehavior;

    /**
     * Validate the given value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function isValid($value): bool
    {
        return is_int($value);
    }
}

```
