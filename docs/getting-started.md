---
sidebar_position: 1
---

# Getting Started

WordNumber is a PHP library that converts numeric values into their word representations in multiple languages.

## Installation

```bash
composer require byjg/wordnumber
```

## Requirements

- PHP 8.3 or higher

## Basic Usage

### English

```php
<?php
use ByJG\WordNumber\EnglishWordNumber;

$wordNumber = new EnglishWordNumber();
echo $wordNumber->write(12.34);
// Output: twelve dollars and thirty four cents
```

### Portuguese

```php
<?php
use ByJG\WordNumber\PortugueseWordNumber;

$wordNumber = new PortugueseWordNumber();
echo $wordNumber->write(12.34);
// Output: doze reais e trinta e quatro centavos
```

### Italian

```php
<?php
use ByJG\WordNumber\ItalianWordNumber;

$wordNumber = new ItalianWordNumber();
echo $wordNumber->write(12.34);
// Output: dodici euro e trenta quattro centesimi
```

## Supported Languages

- English
- Portuguese
- Italian

## How It Works

The library converts numbers into words by:

1. Splitting the number into integer and decimal parts
2. Converting each part into words using language-specific rules
3. Combining them with the appropriate currency names
4. Handling singular/plural forms correctly
