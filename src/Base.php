<?php

namespace ByJG\WordNumber;

abstract class Base implements WordNumberInterface
{

    /**
     * Write a currency Word number.
     * This params receives an integer that represents two decimal points.
     *
     * @param $number
     * @return string
     */
    public function write($number)
    {
        $currency = $this->currency();

        if (intval($number) === 0) {
            return "zero " . $currency[1];
        }

        $integer = intval($number);
        $fration = round(($number - intval($number)) * 100, 0);
        $part1 = $this->process($integer);
        $part2 = $this->process($fration);

        $result = $part1;
        if (!empty($part1)) {
            $result .= ($integer == 1 ? $currency[0] : $currency[1]);
        }
        if (!empty($part2)) {
            $result .= " " . $this->concatWord() . " " . $part2 . ($fration == 1 ? $currency[2] : $currency[3]);
        }

        return $result;
    }

    protected function process($number)
    {
        $thousandArray = $this->tens();

        $numbersArray = [];
        $numbersArray[0] = array_merge([""], $this->unit());
        $numbersArray[1] = array_merge([""], [$this->elevenToNineteen()], $this->twentyToNinety());
        $numbersArray[2] = array_merge([""], $this->hundreds());

        $result = "";

        $thousand = $number % 1000;
        $position = 0;
        $resultTens = "";
        $filledPosition = 0;
        while ($number > 0) {
            $unit = $thousand % 10;
            $ten = intval(($thousand % 100) / 10);
            $hundred = intval(($thousand % 1000) / 100);

            if ($thousand == 100) {
                $resultTens = $this->oneHundred();
            } else {
                if ($ten == 1) {
                    $resultTens = $numbersArray[1][1][$unit];
                } else {
                    $resultTens = $numbersArray[0][$unit];
                    $resultTens = trim($numbersArray[1][$ten] . ($resultTens != "" ? " " : "") . $resultTens);
                }
                $resultTens = $numbersArray[2][$hundred] . (($resultTens != "") && ($numbersArray[2][$hundred] != "") ? " " . $this->concatWord() . " " : "") . $resultTens;
            }
            $result = (($resultTens != "") ? $resultTens . " " . $thousandArray[$position][($thousand == 1) ? 1 : 2] . (($resultTens != "") && ($result != "") ? $thousandArray[$filledPosition][0] : "") : "") . $result;

            $number = intval($number / 1000);
            $thousand = $number % 1000;
            $filledPosition = ($resultTens != "") ? $position : $filledPosition;
            $position++;
        }

        return $result;
    }
}
