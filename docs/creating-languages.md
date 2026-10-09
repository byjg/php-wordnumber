---
sidebar_position: 3
---

# Creating Custom Languages

Every language is a class extending `Base`. `Base` takes care of the currency: it splits the
amount into the major and minor parts, writes "zero", and picks the singular or plural currency
name. The language only has to write a positive integer in words, following its own grammar.

## The WordNumberInterface

```php
<?php

namespace ByJG\WordNumber;

interface WordNumberInterface
{
    public function write(float $number): string;
}
```

You can implement it directly, but extending `Base` is what the bundled languages do.

## Methods to Implement

### currency()

Returns the four currency names:

1. Singular major currency (e.g., "dollar", "real", "euro")
2. Plural major currency (e.g., "dollars", "reais", "euro")
3. Singular minor currency (e.g., "cent", "centavo", "centesimo")
4. Plural minor currency (e.g., "cents", "centavos", "centesimi")

**Return:** `array{string, string, string, string}`

### concatWord()

Returns the word joining the major and the minor amounts: "and" in "one dollar and one cent".

**Return:** `string`

### zero()

Returns the word for zero, used for an amount of exactly zero ("zero dollars").

**Return:** `string`

### integerToWords(int $number)

Writes a positive integer in words, without the currency. This is where the grammar of the
language lives: how tens and units are joined, which connector goes between the groups,
irregular forms such as "cem" or "mille", and so on.

`$number` is at least 1 and below `Base::LIMIT` (one quadrillion), so every group up to the
trillions must be named.

**Return:** `string`

## Helpers Provided by Base

### groups(int $number)

Splits a number into its non-zero groups of three digits, highest first, as
`[group value, scale]` pairs, where scale 0 is the units, 1 the thousands, 2 the millions and
so on. `groups(2500001)` returns `[[2, 2], [500, 1], [1, 0]]`.

### amount(int $number, string $one, string $many)

Writes a quantity followed by the currency name. Override it when the language changes the
number before a noun or links them: Italian writes "un euro" instead of "uno euro", and both
Italian and Portuguese put a preposition before the currency after a round million ("un milione
di euro", "um milhão de reais").

## Example Implementation

Here's a simplified Spanish implementation:

```php
<?php

namespace App\WordNumber;

use ByJG\WordNumber\Base;

class SpanishWordNumber extends Base
{
    private const ONES = [
        "", "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve",
        "diez", "once", "doce", "trece", "catorce", "quince", "dieciséis", "diecisiete", "dieciocho", "diecinueve",
        "veinte", "veintiuno", "veintidós", "veintitrés", "veinticuatro", "veinticinco", "veintiséis",
        "veintisiete", "veintiocho", "veintinueve",
    ];

    private const TENS = [
        "", "", "", "treinta", "cuarenta", "cincuenta", "sesenta", "setenta", "ochenta", "noventa",
    ];

    private const HUNDREDS = [
        "", "ciento", "doscientos", "trescientos", "cuatrocientos", "quinientos",
        "seiscientos", "setecientos", "ochocientos", "novecientos",
    ];

    protected function currency(): array
    {
        return ["euro", "euros", "céntimo", "céntimos"];
    }

    protected function concatWord(): string
    {
        return "con";
    }

    protected function zero(): string
    {
        return "cero";
    }

    protected function integerToWords(int $number): string
    {
        $words = [];
        foreach ($this->groups($number) as [$group, $scale]) {
            $words[] = match ($scale) {
                0 => $this->belowThousand($group),
                1 => $group === 1 ? "mil" : $this->belowThousand($group) . " mil",
                2 => $group === 1 ? "un millón" : $this->belowThousand($group) . " millones",
                // ...and so on up to the trillions
            };
        }

        return implode(" ", $words);
    }

    private function belowThousand(int $number): string
    {
        if ($number === 100) {
            return "cien";
        }

        $rest = $number % 100;
        $tens = $rest < 30
            ? self::ONES[$rest]
            : self::TENS[intdiv($rest, 10)] . ($rest % 10 > 0 ? " y " . self::ONES[$rest % 10] : "");

        return trim(self::HUNDREDS[intdiv($number, 100)] . " " . $tens);
    }
}
```

## Using Your Custom Language

```php
use App\WordNumber\SpanishWordNumber;

$wordNumber = new SpanishWordNumber();
echo $wordNumber->write(123.45);
// Output: ciento veintitrés euros con cuarenta y cinco céntimos
```

## Contributing

If you create a new language implementation, feel free to contribute it back to the project via a pull request!
