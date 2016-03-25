BaseConverter
=============

[![Build Status](https://travis-ci.org/NeoBlack/BaseConverter.svg)](https://travis-ci.org/NeoBlack/BaseConverter) [![GitHub version](https://badge.fury.io/gh/NeoBlack%2FBaseConverter.svg)](http://badge.fury.io/gh/NeoBlack%2FBaseConverter) [![Code Coverage](https://img.shields.io/badge/coverage-report-blue.svg)](https://htmlpreview.github.io/?https://github.com/NeoBlack/BaseConverter/blob/master/docs/index.html)

## Description

BaseConverter is a simple and small library to convert interger values to different other bases and back.

## Install via composer

Just run the following command in your project root:

```
composer require neoblack/base-converter:~1.0
```

### Example usage

```php
<?php
require_once 'vendor/autoload.php';
use NeoBlack\BaseConverter\BaseConverter;

$number = 100;

$base64Number = BaseConverter::toBase($number, BaseConverter::BASE64); // Result: 1A
$base62Number = BaseConverter::toBase($number, BaseConverter::BASE62); // Result: 1C
$base32Number = BaseConverter::toBase($number, BaseConverter::BASE32); // Result: 34
$base16Number = BaseConverter::toBase($number, BaseConverter::BASE16); // Result: 64

BaseConverter::to10Base($base64Number, BaseConverter::BASE64); // Result: 100
BaseConverter::to10Base($base62Number, BaseConverter::BASE62); // Result: 100
BaseConverter::to10Base($base32Number, BaseConverter::BASE32); // Result: 100
BaseConverter::to10Base($base16Number, BaseConverter::BASE16); // Result: 100
```

## Developer Notes

If you want to contribute, fork this repository and send a pull request.

### Unit Test

```
./bin/phpunit -c Build/UnitTests.xml
```

### Coverage report

```
rm -rf docs
./bin/phpunit -c Build/UnitTests.xml --coverage-html docs
```

## License

The MIT License (MIT) [see license file](LICENSE).