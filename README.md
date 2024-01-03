# Wordnumber

[![Build Status](https://github.com/byjg/wordnumber/actions/workflows/phpunit.yml/badge.svg?branch=master)](https://github.com/byjg/wordnumber/actions/workflows/phpunit.yml) 
[![Opensource ByJG](https://img.shields.io/badge/opensource-byjg-success.svg)](http://opensource.byjg.com) 
[![GitHub source](https://img.shields.io/badge/Github-source-informational?logo=github)](https://github.com/byjg/wordnumber/) 
[![GitHub license](https://img.shields.io/github/license/byjg/wordnumber.svg)](https://opensource.byjg.com/opensource/licensing.html) 
[![GitHub release](https://img.shields.io/github/release/byjg/wordnumber.svg)](https://github.com/byjg/wordnumber/releases/)

Write float number in a word number.

Support multiple languages. Until this moment supports

 - English
 - Portuguese
 - Italian (Thanks to [willypuzzle](https://github.com/willypuzzle))

# Examples

```php
$wordNumber = new \ByJG\WordNumber\EnglishWordNumber();
$wordnumber->write(12.34);  # writes twelve dollars and third four cents
```

or

```php
$wordNumber = new \ByJG\WordNumber\PortugueseWordNumber();
$wordnumber->write(12.34);  # writes doze reais e trinta e quatro centavos.
```

# Create other languages

You have to implement the interface WordNumberInterface with the proper word number in your language.
If you create feel free to send to us.

```php
interface WordNumberInterface
{
    public function concatWord();

    public function currency();

    public function tens();

    public function unit();

    public function elevenToNineteen();

    public function twentyToNinety();

    public function hundreds();

    public function oneHundred();
}
```

## Dependencies

```mermaid  
flowchart TD  
    byjg/wordnumber
```

----  
[Open source ByJG](http://opensource.byjg.com)
