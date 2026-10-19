<?php

namespace ByJG\WordNumber;

/**
 * English, British style: "and" before the tens and units ("one hundred and one",
 * "one thousand and one"), and a hyphen inside compound tens ("twenty-one").
 */
class EnglishWordNumber extends Base
{
    /** @var array<int, string> */
    private static array $ones = [
        "", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine",
        "ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen",
    ];

    /** @var array<int, string> */
    private static array $tens = [
        "", "", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety",
    ];

    /** @var array<int, string> */
    private static array $scales = ["", "thousand", "million", "billion", "trillion"];

    #[\Override]
    protected function currency(): array
    {
        return ["dollar", "dollars", "cent", "cents"];
    }

    #[\Override]
    protected function concatWord(): string
    {
        return "and";
    }

    #[\Override]
    protected function zero(): string
    {
        return "zero";
    }

    #[\Override]
    protected function integerToWords(int $number): string
    {
        $groups = $this->groups($number);
        $last = count($groups) - 1;

        $words = [];
        foreach ($groups as $i => [$group, $scale]) {
            $text = $this->belowThousand($group);
            if ($i > 0 && $i === $last && $scale === 0 && $group < 100) {
                $text = "and " . $text;
            }
            $words[] = trim($text . " " . self::$scales[$scale]);
        }

        return implode(" ", $words);
    }

    private function belowThousand(int $number): string
    {
        $hundreds = intdiv($number, 100);
        $rest = $number % 100;

        $words = [];
        if ($hundreds > 0) {
            $words[] = self::$ones[$hundreds] . " hundred";
        }
        if ($rest > 0) {
            $words[] = ($hundreds > 0 ? "and " : "") . $this->belowHundred($rest);
        }

        return implode(" ", $words);
    }

    private function belowHundred(int $number): string
    {
        if ($number < 20) {
            return self::$ones[$number];
        }

        $unit = $number % 10;
        return self::$tens[intdiv($number, 10)] . ($unit > 0 ? "-" . self::$ones[$unit] : "");
    }
}
