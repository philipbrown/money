# Money

**Shameless port of [RubyMoney](https://github.com/RubyMoney/money)**

[![Build Status](https://travis-ci.org/philipbrown/money.png?branch=master)](https://travis-ci.org/philipbrown/money)

`Money` is a PHP class that allows you to easily work with money within your application including it's value and currency. Each currency has it's associated information encapsulated with a seperate `Currency` class.

Values are reperesented as integers in cents to avoid floating point rounding errors.

Return values are immutable value objects.

## Installation
Add `philipbrown/money` as a requirement to `composer.json`:

```json
{
  "require": {
    "philipbrown/money": "dev-master"
  }
}
```
Update your packages with `composer update`.

## License
The MIT License (MIT)

Copyright (c) 2013 Philip Brown

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
