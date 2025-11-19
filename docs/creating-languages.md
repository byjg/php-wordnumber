---
sidebar_position: 3
---

# Creating Custom Languages

You can add support for additional languages by implementing the `WordNumberInterface`.

## The WordNumberInterface

```php
<?php

namespace ByJG\WordNumber;

interface WordNumberInterface
{
    public function concatWord(): string;

    public function currency(): array;

    public function tens(): array;

    public function unit(): array;

    public function elevenToNineteen(): array;

    public function twentyToNinety(): array;

    public function hundreds(): array;

    public function oneHundred(): string;
}
```

## Method Descriptions

### concatWord()

Returns the conjunction word used to connect number parts (e.g., "and" in English, "e" in Portuguese/Italian).

**Return:** `string`

### currency()

Returns an array with four elements representing the currency names:

1. Singular major currency (e.g., "dollar", "real", "euro")
2. Plural major currency (e.g., "dollars", "reais", "euro")
3. Singular minor currency (e.g., "cent", "centavo", "centesimo")
4. Plural minor currency (e.g., "cents", "centavos", "centesimi")

**Return:** `array`

### unit()

Returns an array with words for numbers 1-9.

**Return:** `array` - ["one", "two", "three", ..., "nine"]

### elevenToNineteen()

Returns an array with words for numbers 10-19.

**Return:** `array` - ["ten", "eleven", "twelve", ..., "nineteen"]

### twentyToNinety()

Returns an array with words for multiples of ten from 20 to 90.

**Return:** `array` - ["twenty", "thirty", "forty", ..., "ninety"]

### hundreds()

Returns an array with words for hundreds from 100 to 900.

**Return:** `array` - ["one hundred", "two hundred", ..., "nine hundred"]

### oneHundred()

Returns the word for exactly 100 (which might differ from "one hundred" in some languages).

**Return:** `string`

### tens()

Returns a multi-dimensional array defining the thousands separators and names:

```php
[
    [" and ", "", ""],  // Connector for units
    [", ", "thousand", "thousands"],
    [", ", "million", "millions"],
    [", ", "billion", "billions"],
    [", ", "trillion", "trillions"],
]
```

**Return:** `array`

## Example Implementation

Here's a simplified example for a custom language:

```php
<?php

namespace ByJG\WordNumber;

class GermanWordNumber extends Base
{
    public function concatWord(): string
    {
        return "und";
    }

    public function currency(): array
    {
        return ["Euro", "Euro", "Cent", "Cent"];
    }

    public function unit(): array
    {
        return [
            "eins", "zwei", "drei", "vier", "fünf",
            "sechs", "sieben", "acht", "neun"
        ];
    }

    public function elevenToNineteen(): array
    {
        return [
            "zehn", "elf", "zwölf", "dreizehn", "vierzehn",
            "fünfzehn", "sechzehn", "siebzehn", "achtzehn", "neunzehn"
        ];
    }

    public function twentyToNinety(): array
    {
        return [
            "zwanzig", "dreißig", "vierzig", "fünfzig",
            "sechzig", "siebzig", "achtzig", "neunzig"
        ];
    }

    public function oneHundred(): string
    {
        return "hundert";
    }

    public function hundreds(): array
    {
        return [
            "einhundert", "zweihundert", "dreihundert", "vierhundert",
            "fünfhundert", "sechshundert", "siebenhundert",
            "achthundert", "neunhundert"
        ];
    }

    public function tens(): array
    {
        return [
            [" und ", "", ""],
            [", ", "tausend", "tausend"],
            [", ", "Million", "Millionen"],
            [", ", "Milliarde", "Milliarden"],
            [", ", "Billion", "Billionen"],
        ];
    }
}
```

## Using Your Custom Language

```php
use ByJG\WordNumber\GermanWordNumber;

$wordNumber = new GermanWordNumber();
echo $wordNumber->write(123.45);
```

## Contributing

If you create a new language implementation, feel free to contribute it back to the project via a pull request!
