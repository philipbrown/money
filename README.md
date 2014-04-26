# Money

**Shameless port of [RubyMoney](https://github.com/RubyMoney/money)**

[![Build Status](https://travis-ci.org/philipbrown/money.png?branch=master)](https://travis-ci.org/philipbrown/money)

`Money` is a PHP class that allows you to easily work with money within your application including it's value and currency. Each currency has it's associated information encapsulated with a seperate `Currency` class.

Values are represented as integers in cents to avoid floating point rounding errors.

Return values are immutable value objects.

## Installation
Add `philipbrown/money` as a requirement to `composer.json`:

```json
{
  "require": {
    "philipbrown/money": "1.*"
  }
}
```
Update your packages with `composer update`.

## Usage
To create a new `Money` object you either instantiate like you normally would, or use the `init` static convenience method.
```php
// Create a new Money object representing $5 USD
$m = Money::init(500, 'USD');
$m = new Money(500, 'USD');
```

Values are stored as integers to avoid the problem of floating point errors. To access the value of the `Money` object you can simply request the `cents` property. To get the currency of the object you can request the `currency` property. This will return an instance of `Money\Curreny` that has a `__toString` method.
```php
$m->cents; // 500
$m->currency; // United States Dollar
```

Equality is important to working with many different types of currency. You shouldn't be able to blindly add two different currencies without some kind of exchange process.
```php
$m = Money::init(500, 'USD');

$m->isSameCurrency(Money::init(500, 'GBP')); // false
```

A [Value Object](http://en.wikipedia.org/wiki/Value_object) is an object that represents an entity whose equality isn't based on identity: i.e. two value objects are equal when they have the same value, not necessarily being the same object.
```php
$one = Money::init(500, 'USD');
$two = Money::init(500, 'USD');
$three = Money::init(501, 'USD');

$one->equals($two); // true
$one->equals($three); // false
```

Inevitably you are going to need to add, subtract, multiply and divide values of money in your application.
```php
$one = Money::init(500, 'USD');
$two = Money::init(500, 'USD');
$three = $one->add($two);
$three->cents // 1000
```
Again, you shouldn't be able to add to values of different currencies without some kind of exchange process.
```php
$one = Money::init(500, 'USD');
$two = Money::init(500, 'GBP');

$three = $one->add($two); // Money\Exception\InvalidCurrencyException
```

## License
The MIT License (MIT)

Copyright (c) 2014 Philip Brown

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
