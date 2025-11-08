<?php

namespace ByJG\WordNumber;

class EnglishWordNumber extends Base
{
    #[\Override]
    public function concatWord(): string
    {
        return "and";
    }

    #[\Override]
    public function currency(): array
    {
        return ["dollar", "dollars", "cent", "cents"];
    }

    #[\Override]
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

    #[\Override]
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

    #[\Override]
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

    #[\Override]
    public function oneHundred(): string
    {
        return "one hundred";
    }

    #[\Override]
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

    #[\Override]
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
