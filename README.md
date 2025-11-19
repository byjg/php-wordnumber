# WordNumber

[![Build Status](https://github.com/byjg/php-wordnumber/actions/workflows/phpunit.yml/badge.svg?branch=master)](https://github.com/byjg/php-wordnumber/actions/workflows/phpunit.yml)
[![Opensource ByJG](https://img.shields.io/badge/opensource-byjg-success.svg)](http://opensource.byjg.com)
[![GitHub source](https://img.shields.io/badge/Github-source-informational?logo=github)](https://github.com/byjg/php-wordnumber/)
[![GitHub license](https://img.shields.io/github/license/byjg/php-wordnumber.svg)](https://opensource.byjg.com/opensource/licensing.html)
[![GitHub release](https://img.shields.io/github/release/byjg/php-wordnumber.svg)](https://github.com/byjg/php-wordnumber/releases/)

Convert numeric values into their word representations in multiple languages.

## Features

- Convert integers and floats to word numbers
- Support for multiple languages:
  - English
  - Portuguese
  - Italian (Thanks to [willypuzzle](https://github.com/willypuzzle))
- Currency formatting with singular/plural forms
- Extensible architecture for adding new languages

## Installation

```bash
composer require byjg/wordnumber
```

## Quick Start

### English

```php
use ByJG\WordNumber\EnglishWordNumber;

$wordNumber = new EnglishWordNumber();
echo $wordNumber->write(12.34);
// Output: twelve dollars and thirty four cents
```

### Portuguese

```php
use ByJG\WordNumber\PortugueseWordNumber;

$wordNumber = new PortugueseWordNumber();
echo $wordNumber->write(12.34);
// Output: doze reais e trinta e quatro centavos
```

### Italian

```php
use ByJG\WordNumber\ItalianWordNumber;

$wordNumber = new ItalianWordNumber();
echo $wordNumber->write(12.34);
// Output: dodici euro e trenta quattro centesimi
```

## Documentation

- [Getting Started](docs/getting-started.md)
- [Usage Examples](docs/usage.md)
- [Creating Custom Languages](docs/creating-languages.md)

## Dependencies

```mermaid
flowchart TD
    byjg/wordnumber
```

----
[Open source ByJG](http://opensource.byjg.com)
