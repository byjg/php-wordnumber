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
// Output: one thousand and one hundred and eleven dollars
```

### Decimal Numbers

```php
use ByJG\WordNumber\EnglishWordNumber;

$wordNumber = new EnglishWordNumber();

echo $wordNumber->write(1.01);
// Output: one dollar and one cent

echo $wordNumber->write(1.99);
// Output: one dollar and ninety nine cents

echo $wordNumber->write(123.45);
// Output: one hundred and twenty three dollars and fourty five cents
```

### Large Numbers

```php
use ByJG\WordNumber\EnglishWordNumber;

$wordNumber = new EnglishWordNumber();

echo $wordNumber->write(1000000);
// Output: one milion dollars

echo $wordNumber->write(1000000000);
// Output: one bilion dollars
```

## Language-Specific Examples

### Portuguese Examples

```php
use ByJG\WordNumber\PortugueseWordNumber;

$wordNumber = new PortugueseWordNumber();

echo $wordNumber->write(0);
// Output: zero reais

echo $wordNumber->write(1);
// Output: um real

echo $wordNumber->write(100);
// Output: cem reais

echo $wordNumber->write(1.50);
// Output: um real e cinquenta centavos
```

### Italian Examples

```php
use ByJG\WordNumber\ItalianWordNumber;

$wordNumber = new ItalianWordNumber();

echo $wordNumber->write(0);
// Output: zero euro

echo $wordNumber->write(1);
// Output: uno euro

echo $wordNumber->write(100);
// Output: cento euro

echo $wordNumber->write(1.50);
// Output: uno euro e cinquanta centesimi
```
