<?php

namespace ByJG\WordNumber;

class EnglishWordNumber extends Base
{
    public function concatWord()
    {
        return "and";
    }

    public function currency()
    {
        return ["dollar", "dollars", "cent", "cents"];
    }

    public function unit()
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

    public function elevenToNineteen()
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

    public function twentyToNinety()
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

    public function oneHundred()
    {
        return "one hundred";
    }

    public function hundreds()
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

    public function tens()
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
