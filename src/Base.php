<?php

namespace ByJG\WordNumber;

use InvalidArgumentException;

abstract class Base implements WordNumberInterface
{
    /**
     * One quadrillion: every language names its groups up to the trillions.
     */
    public const int LIMIT = 1_000_000_000_000_000;

    /**
     * The currency names: [singular major, plural major, singular minor, plural minor].
     *
     * @return array{string, string, string, string}
     */
    abstract protected function currency(): array;

    /**
     * The word joining the major and the minor amounts ("and" in "one dollar and one cent").
     */
    abstract protected function concatWord(): string;

    abstract protected function zero(): string;

    /**
     * Write a positive integer in words, following the grammar of the language.
     */
    abstract protected function integerToWords(int $number): string;

    #[\Override]
    public function write(float $number): string
    {
        if ($number < 0 || $number >= self::LIMIT) {
            throw new InvalidArgumentException("The number must be between 0 and " . number_format(self::LIMIT) . " (exclusive)");
        }

        $cents = (int)round($number * 100.0);
        [$one, $many, $oneMinor, $manyMinor] = $this->currency();

        if ($cents === 0) {
            return $this->zero() . " " . $many;
        }

        $integer = intdiv($cents, 100);
        $fraction = $cents % 100;

        $parts = [];
        if ($integer > 0) {
            $parts[] = $this->amount($integer, $one, $many);
        }
        if ($fraction > 0) {
            $parts[] = $this->amount($fraction, $oneMinor, $manyMinor);
        }

        return implode(" " . $this->concatWord() . " ", $parts);
    }

    /**
     * Write a quantity followed by the currency name. Override when the language changes the
     * number before a noun ("un euro") or links them ("um milhão de reais").
     */
    protected function amount(int $number, string $one, string $many): string
    {
        return $this->integerToWords($number) . " " . ($number === 1 ? $one : $many);
    }

    /**
     * Split a number into its non-zero groups of three digits, highest first.
     *
     * @return list<array{int, int}> pairs of [group value, scale], where scale 0 is units,
     *                               1 thousands, 2 millions and so on
     */
    protected function groups(int $number): array
    {
        $groups = [];
        for ($scale = 0; $number > 0; $scale++, $number = intdiv($number, 1000)) {
            if ($number % 1000 > 0) {
                array_unshift($groups, [$number % 1000, $scale]);
            }
        }

        return $groups;
    }
}
