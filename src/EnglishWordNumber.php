<?php

namespace ByJG\WordNumber;

class EnglishWordNumber extends Base
{
    public function concatWord(): string
    {
        return "and";
    }

    public function currency(): array
    {
        return ["dollar", "dollars", "cent", "cents"];
    }

    public function unit(): array
    {
        return [
            "one",
            "two",
            "three",
            "four",
            "five",
            "six",
            "seven",
            "eight",
            "nine",
        ];
    }

    public function elevenToNineteen(): array
    {
        return [
            "ten",
            "eleven",
            "twelve",
            "thirteen",
            "fourteen",
            "fifteen",
            "sixteen",
            "seventeen",
            "eighteen",
            "nineteen",
        ];
    }

    public function twentyToNinety(): array
    {
        return [
            "twenty",
            "thirty",
            "fourty",
            "fifty",
            "sixty",
            "seventy",
            "eigthty",
            "ninety",
        ];
    }

    public function oneHundred(): string
    {
        return "one hundred";
    }

    public function hundreds(): array
    {
        return [
            "one hundred",
            "two hundred",
            "three hundred",
            "four hundred",
            "five hundred",
            "six hundred",
            "seven hundred",
            "eigth hundred",
            "nine hundred",
        ];
    }

    public function tens(): array
    {
        return [
            [" and ", "", ""],
            [", ", "thousand", "thousands"],
            [", ", "milion", "milions"],
            [", ", "bilion", "bilions"],
            [", ", "trilion", "trilions"],
        ];
    }
}
