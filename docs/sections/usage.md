---
layout: default
title: Usage
nav_order: 2
permalink: /usage
---

# Usage
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

There are different ways of using this package which will be outlined further down. Choose whatever suits your needs better.

## Using Inheritance

The most simple way to use the package is by extending the `SingleValueObject` or `SingleImmutableValueObject` classes:


### Single Value Object

```php
use NorseBlue\ValueObjects\SingleValueObject;

class MyObject extends SingleValueObject
{
}
```

### Single Immutable Value Object

```php
use NorseBlue\ValueObjects\SingleImmutableValueObject;

class MyObject extends SingleImmutableValueObject
{
}
```

In both cases the `isValid` method should be implemented within your class.

[See complete example]({{ site.baseurl }}{% link sections/examples.md %}#example-with-inheritance)

## Using Composition

If you prefer composition over inheritance, you can use the provided traits and contracts instead:

### Single Value Object

```php
use NorseBlue\ValueObjects\Contracts\SingleValueObject as SingleValueObjectContract;
use NorseBlue\ValueObjects\Traits\SingleValueObjectBehavior;

class MyObject implements SingleValueObjectContract
{
    use SingleValueObjectBehavior;
}
```

### Single Immutable Value Object

```php
use NorseBlue\ValueObjects\Contracts\SingleValueObject as SingleValueObjectContract;
use NorseBlue\ValueObjects\Traits\SingleImmutableValueObjectBehavior;

class MyObject implements SingleValueObjectContract
{
    use SingleImmutableValueObjectBehavior;
}
```

[See complete example]({{ site.baseurl }}{% link sections/examples.md %}#example-with-composition)

_**Note:** The `SingleValueObject` contract is not really needed because all implementation is in the trait, but it is encourage to also implement the contract to allow decoupling in your application._

## Accessing value

The value can be accessed like any object property:

```php
echo $my_object->value;
```

The value object has a `__toString` method already defined that casts the value to string.

## Mutating value

The value can be mutated like any object property:

```php
$my_object->value = 'new value';
```

An immutable value object will throw a `ImmutableValueObjectException` when trying to mutate the value.
