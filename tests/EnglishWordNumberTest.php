<?php

namespace Tests;

use ByJG\WordNumber\Base;
use ByJG\WordNumber\EnglishWordNumber;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class EnglishWordNumberTest extends TestCase
{
    /**
     * @return list<array{float|int, string}>
     */
    public static function provider(): array
    {
        return [
            // Units and teens
            [0, 'zero dollars'],
            [1, 'one dollar'],
            [2, 'two dollars'],
            [3, 'three dollars'],
            [4, 'four dollars'],
            [5, 'five dollars'],
            [6, 'six dollars'],
            [7, 'seven dollars'],
            [8, 'eight dollars'],
            [9, 'nine dollars'],
            [10, 'ten dollars'],
            [11, 'eleven dollars'],
            [12, 'twelve dollars'],
            [13, 'thirteen dollars'],
            [14, 'fourteen dollars'],
            [15, 'fifteen dollars'],
            [16, 'sixteen dollars'],
            [17, 'seventeen dollars'],
            [18, 'eighteen dollars'],
            [19, 'nineteen dollars'],

            // Tens: a hyphen joins the unit
            [20, 'twenty dollars'],
            [21, 'twenty-one dollars'],
            [22, 'twenty-two dollars'],
            [23, 'twenty-three dollars'],
            [24, 'twenty-four dollars'],
            [25, 'twenty-five dollars'],
            [26, 'twenty-six dollars'],
            [27, 'twenty-seven dollars'],
            [28, 'twenty-eight dollars'],
            [29, 'twenty-nine dollars'],
            [30, 'thirty dollars'],
            [31, 'thirty-one dollars'],
            [32, 'thirty-two dollars'],
            [33, 'thirty-three dollars'],
            [34, 'thirty-four dollars'],
            [35, 'thirty-five dollars'],
            [36, 'thirty-six dollars'],
            [37, 'thirty-seven dollars'],
            [38, 'thirty-eight dollars'],
            [39, 'thirty-nine dollars'],
            [40, 'forty dollars'],
            [41, 'forty-one dollars'],
            [42, 'forty-two dollars'],
            [43, 'forty-three dollars'],
            [44, 'forty-four dollars'],
            [45, 'forty-five dollars'],
            [46, 'forty-six dollars'],
            [47, 'forty-seven dollars'],
            [48, 'forty-eight dollars'],
            [49, 'forty-nine dollars'],
            [50, 'fifty dollars'],
            [51, 'fifty-one dollars'],
            [52, 'fifty-two dollars'],
            [53, 'fifty-three dollars'],
            [54, 'fifty-four dollars'],
            [55, 'fifty-five dollars'],
            [56, 'fifty-six dollars'],
            [57, 'fifty-seven dollars'],
            [58, 'fifty-eight dollars'],
            [59, 'fifty-nine dollars'],
            [60, 'sixty dollars'],
            [61, 'sixty-one dollars'],
            [62, 'sixty-two dollars'],
            [63, 'sixty-three dollars'],
            [64, 'sixty-four dollars'],
            [65, 'sixty-five dollars'],
            [66, 'sixty-six dollars'],
            [67, 'sixty-seven dollars'],
            [68, 'sixty-eight dollars'],
            [69, 'sixty-nine dollars'],
            [70, 'seventy dollars'],
            [71, 'seventy-one dollars'],
            [72, 'seventy-two dollars'],
            [73, 'seventy-three dollars'],
            [74, 'seventy-four dollars'],
            [75, 'seventy-five dollars'],
            [76, 'seventy-six dollars'],
            [77, 'seventy-seven dollars'],
            [78, 'seventy-eight dollars'],
            [79, 'seventy-nine dollars'],
            [80, 'eighty dollars'],
            [81, 'eighty-one dollars'],
            [82, 'eighty-two dollars'],
            [83, 'eighty-three dollars'],
            [84, 'eighty-four dollars'],
            [85, 'eighty-five dollars'],
            [86, 'eighty-six dollars'],
            [87, 'eighty-seven dollars'],
            [88, 'eighty-eight dollars'],
            [89, 'eighty-nine dollars'],
            [90, 'ninety dollars'],
            [91, 'ninety-one dollars'],
            [92, 'ninety-two dollars'],
            [93, 'ninety-three dollars'],
            [94, 'ninety-four dollars'],
            [95, 'ninety-five dollars'],
            [96, 'ninety-six dollars'],
            [97, 'ninety-seven dollars'],
            [98, 'ninety-eight dollars'],
            [99, 'ninety-nine dollars'],

            // Hundreds: "and" before the tens and units
            [100, 'one hundred dollars'],
            [101, 'one hundred and one dollars'],
            [123, 'one hundred and twenty-three dollars'],
            [201, 'two hundred and one dollars'],
            [301, 'three hundred and one dollars'],
            [401, 'four hundred and one dollars'],
            [501, 'five hundred and one dollars'],
            [601, 'six hundred and one dollars'],
            [701, 'seven hundred and one dollars'],
            [801, 'eight hundred and one dollars'],
            [901, 'nine hundred and one dollars'],
            [999, 'nine hundred and ninety-nine dollars'],

            // Thousands: "thousand" never takes an "s"
            [1000, 'one thousand dollars'],
            [1001, 'one thousand and one dollars'],
            [1100, 'one thousand one hundred dollars'],
            [1111, 'one thousand one hundred and eleven dollars'],
            [2000, 'two thousand dollars'],
            [2111, 'two thousand one hundred and eleven dollars'],
            [3111, 'three thousand one hundred and eleven dollars'],
            [4111, 'four thousand one hundred and eleven dollars'],
            [5111, 'five thousand one hundred and eleven dollars'],
            [6111, 'six thousand one hundred and eleven dollars'],
            [7111, 'seven thousand one hundred and eleven dollars'],
            [8111, 'eight thousand one hundred and eleven dollars'],
            [9111, 'nine thousand one hundred and eleven dollars'],
            [10111, 'ten thousand one hundred and eleven dollars'],
            [11111, 'eleven thousand one hundred and eleven dollars'],
            [21000, 'twenty-one thousand dollars'],
            [100000, 'one hundred thousand dollars'],
            [999999, 'nine hundred and ninety-nine thousand nine hundred and ninety-nine dollars'],

            // Millions and up
            [1000000, 'one million dollars'],
            [1000001, 'one million and one dollars'],
            [1001000, 'one million one thousand dollars'],
            [2500000, 'two million five hundred thousand dollars'],
            [1000000000, 'one billion dollars'],
            [3000000000, 'three billion dollars'],

            // Cents
            [0.01, 'one cent'],
            [0.5, 'fifty cents'],
            [1, 'one dollar'],
            [1.01, 'one dollar and one cent'],
            [1.02, 'one dollar and two cents'],
            [1.03, 'one dollar and three cents'],
            [1.04, 'one dollar and four cents'],
            [1.05, 'one dollar and five cents'],
            [1.06, 'one dollar and six cents'],
            [1.07, 'one dollar and seven cents'],
            [1.08, 'one dollar and eight cents'],
            [1.09, 'one dollar and nine cents'],
            [1.1, 'one dollar and ten cents'],
            [1.11, 'one dollar and eleven cents'],
            [1.12, 'one dollar and twelve cents'],
            [1.13, 'one dollar and thirteen cents'],
            [1.14, 'one dollar and fourteen cents'],
            [1.15, 'one dollar and fifteen cents'],
            [1.16, 'one dollar and sixteen cents'],
            [1.17, 'one dollar and seventeen cents'],
            [1.18, 'one dollar and eighteen cents'],
            [1.19, 'one dollar and nineteen cents'],
            [1.2, 'one dollar and twenty cents'],
            [1.21, 'one dollar and twenty-one cents'],
            [1.29, 'one dollar and twenty-nine cents'],
            [1.3, 'one dollar and thirty cents'],
            [1.33, 'one dollar and thirty-three cents'],
            [1.4, 'one dollar and forty cents'],
            [1.45, 'one dollar and forty-five cents'],
            [1.5, 'one dollar and fifty cents'],
            [1.58, 'one dollar and fifty-eight cents'],
            [1.6, 'one dollar and sixty cents'],
            [1.61, 'one dollar and sixty-one cents'],
            [1.7, 'one dollar and seventy cents'],
            [1.77, 'one dollar and seventy-seven cents'],
            [1.8, 'one dollar and eighty cents'],
            [1.88, 'one dollar and eighty-eight cents'],
            [1.9, 'one dollar and ninety cents'],
            [1.99, 'one dollar and ninety-nine cents'],
            [12.34, 'twelve dollars and thirty-four cents'],
            [123.45, 'one hundred and twenty-three dollars and forty-five cents'],
        ];
    }

    #[DataProvider('provider')]
    public function testEnglishWords(float|int $input, string $expected): void
    {
        $this->assertSame($expected, (new EnglishWordNumber())->write($input));
    }

    public function testLargestNumber(): void
    {
        $this->assertSame(
            'nine hundred and ninety-nine trillion dollars',
            (new EnglishWordNumber())->write(999_000_000_000_000)
        );
    }

    public function testNegativeNumberIsRejected(): void
    {
        $this->expectException(InvalidArgumentException::class);
        (new EnglishWordNumber())->write(-1);
    }

    public function testNumberAboveTheLimitIsRejected(): void
    {
        $this->expectException(InvalidArgumentException::class);
        (new EnglishWordNumber())->write(Base::LIMIT);
    }
}
