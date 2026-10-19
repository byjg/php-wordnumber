# Changelog - Version 7.0

> **Status: in development.** This document tracks changes landing on the `7.0` branch.
> Nothing here is released yet, and the contents may still change.

## Breaking Changes

- **The output of every language changed.** The words were produced by a single table-driven
  algorithm shared by all languages, which could not follow the grammar of any of them. Each
  language now writes numbers by its own rules:

  | | Before | Now |
  |---|---|---|
  | English | `twenty one`, `fourty`, `eigthty`, `two thousands`, `one thousand and one hundred and eleven`, `one milion` | `twenty-one`, `forty`, `eighty`, `two thousand`, `one thousand one hundred and eleven`, `one million` |
  | Portuguese | `vinte um`, `tres`, `um mil e um`, `um mil e cento e onze`, `um milhao` | `vinte e um`, `três`, `mil e um`, `mil cento e onze`, `um milhão de reais` |
  | Italian | `uno euro`, `venti uno`, `diciasette`, `mille e uno` (for 101), `uno mille e mille e undici` (for 1111) | `un euro`, `ventuno`, `diciassette`, `centouno`, `millecentoundici` |

  Applications that store or compare the written text must expect the new forms.
- **`WordNumberInterface` now declares only `write(float $number): string`.** The table methods
  (`unit()`, `elevenToNineteen()`, `twentyToNinety()`, `hundreds()`, `oneHundred()`, `tens()`) are
  gone, as is the protected `Base::process()`, and `currency()` and `concatWord()` are now
  protected methods of `Base`. A custom language extends `Base` and implements `currency()`,
  `concatWord()`, `zero()` and `integerToWords(int $number)`; see `docs/creating-languages.md`.
- **`write()` throws `InvalidArgumentException`** for a negative number or one at or above
  `Base::LIMIT` (one quadrillion). Before, a negative number returned an empty string and a larger
  one failed with an undefined array offset.

## Bug Fixes

- An amount below one is written in cents: `write(0.5)` returns `fifty cents`; it used to return
  `zero dollars`.
- A round thousand or more is separated from the currency: `write(2000)` returns
  `two thousand dollars`; it used to return `two thousandsdollars` (and `um milhaoreais` in
  Portuguese).

## Requirements

- PHP 8.3, 8.4, 8.5 and 8.6 are now supported: `"php": ">=8.3 <8.7"`.
  The previous `<8.6` upper bound excluded PHP 8.6, since `<8.6` is exclusive.

## Toolchain

- PHPUnit updated to `^12.5`.
- Psalm is installed as `psalm/phar` (`^6.16`) instead of `vimeo/psalm`.

  `vimeo/psalm` lists the PHP versions it supports and no published release includes
  8.6, so as a dev dependency it made `composer install` fail on the 8.6 build job
  before any test ran. `psalm/phar` requires only `php ^8.2` and bundles its own
  dependencies, so it installs on every PHP version in the matrix and cannot conflict
  with the project's. Psalm itself still refuses to *run* on 8.6, which is why the
  Psalm job uses 8.5. `composer psalm` runs it.

  PHPUnit 13 is deliberately **not** used. It requires PHP `>=8.4.1`, which would
  break the 8.3 floor.

## Continuous Integration

- The build matrix now includes PHP 8.6.
- The Psalm job now runs on PHP 8.5. Psalm declares
  `~8.1.31 || ~8.2.27 || ~8.3.16 || ~8.4.3 || ~8.5.0` and therefore does not run on
  PHP 8.6.

## Housekeeping

- `phpunit.xml.dist` renamed to `phpunit.xml`.
- The `LICENSE` file is now the MIT license, the one `composer.json` has always declared. The
  file previously carried the GPL v3 text by mistake.
