---
sidebar_position: 2
---

# Usage Examples

## Writing Different Number Formats

### Whole Numbers

```php
use ByJG\WordNumber\EnglishWordNumber;

$wordNumber = new EnglishWordNumber();

echo $wordNumber->write(0);
// Output: zero dollars

echo $wordNumber->write(1);
// Output: one dollar

echo $wordNumber->write(100);
// Output: one hundred dollars

echo $wordNumber->write(1000);
// Output: one thousand dollars

echo $wordNumber->write(1111);
// Output: one thousand one hundred and eleven dollars
```

### Decimal Numbers

Only the first two decimal places are considered.

```php
use ByJG\WordNumber\EnglishWordNumber;

$wordNumber = new EnglishWordNumber();

echo $wordNumber->write(0.5);
// Output: fifty cents

echo $wordNumber->write(1.01);
// Output: one dollar and one cent

echo $wordNumber->write(1.99);
// Output: one dollar and ninety-nine cents

echo $wordNumber->write(123.45);
// Output: one hundred and twenty-three dollars and forty-five cents
```

### Large Numbers

```php
use ByJG\WordNumber\EnglishWordNumber;

$wordNumber = new EnglishWordNumber();

echo $wordNumber->write(1000000);
// Output: one million dollars

echo $wordNumber->write(1000000000);
// Output: one billion dollars
```

The largest number accepted is just below one quadrillion (`Base::LIMIT`). A negative number or
one at or above the limit throws an `InvalidArgumentException`.

## Language-Specific Examples

Each language follows its own grammar, not a word-by-word translation.

### English

British style: "and" before the tens and units, and a hyphen inside compound tens.

```php
use ByJG\WordNumber\EnglishWordNumber;

$wordNumber = new EnglishWordNumber();

echo $wordNumber->write(21);
// Output: twenty-one dollars

echo $wordNumber->write(1001);
// Output: one thousand and one dollars

echo $wordNumber->write(2111);
// Output: two thousand one hundred and eleven dollars
```

### Portuguese

Brazilian Portuguese: "e" between hundreds, tens and units; "mil" without "um"; and "de" before
the currency for round millions.

```php
use ByJG\WordNumber\PortugueseWordNumber;

$wordNumber = new PortugueseWordNumber();

echo $wordNumber->write(0);
// Output: zero reais

echo $wordNumber->write(1);
// Output: um real

echo $wordNumber->write(100);
// Output: cem reais

echo $wordNumber->write(1001);
// Output: mil e um reais

echo $wordNumber->write(1111);
// Output: mil cento e onze reais

echo $wordNumber->write(1000000);
// Output: um milhão de reais

echo $wordNumber->write(1.50);
// Output: um real e cinquenta centavos
```

### Italian

Everything below a million is a single word, the tens drop their final vowel before "uno" and
"otto", and a compound ending in "tre" takes the accent.

```php
use ByJG\WordNumber\ItalianWordNumber;

$wordNumber = new ItalianWordNumber();

echo $wordNumber->write(0);
// Output: zero euro

echo $wordNumber->write(1);
// Output: un euro

echo $wordNumber->write(28);
// Output: ventotto euro

echo $wordNumber->write(123);
// Output: centoventitré euro

echo $wordNumber->write(1111);
// Output: millecentoundici euro

echo $wordNumber->write(1000000);
// Output: un milione di euro

echo $wordNumber->write(1.50);
// Output: un euro e cinquanta centesimi
```
