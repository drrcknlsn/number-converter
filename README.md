NumberConverter
===============

NumberConverter is a simple interface for converting numbers from their numeric
representations into their written, lingual representations. Other, probably
better solutions already exist (see below), and this was created only as a
coding exercise.

### Example

```php
$converter = new DrrckNlsn\NumberConverter\EnglishNumberConverter();
echo $converter->convert(1234567);
```

Output:

```bash
one million two hundred thirty four thousand five hundred sixty seven
```

### Internationalization

Currently, there is only an `EnglishNumberConverter` implementation, but the
project was created with other languages in mind.

### Demo

This package comes with a simple CLI binary for demonstrating the
`EnglishNumberConverter` class, located at `bin/convertNumber`.

### Installing via Composer

The recommended way to install NumberConverter is via [Composer](https://getcomposer.org/doc/00-intro.md):

```bash
composer require drrcknlsn/number-converter
```

After installing the dependency, you will need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

### Existing Solutions

The [`intl`](http://php.net/manual/en/book.intl.php) extension provides the [`NumberFormatter`](http://php.net/manual/en/class.numberformatter.php)
class, which can be used to accomplish the same goal, using `NumberFormatter::SPELLOUT`.
