<?php

namespace ByJG\WordNumber;

/**
 * Italian: everything below a million is written as one word ("millecentoundici"), the tens
 * lose their final vowel before "uno" and "otto" ("ventuno", "ventotto"), and a compound ending
 * in "tre" takes the accent ("ventitré", "centotré"). Millions and up are separate words
 * ("un milione duecentomila").
 */
class ItalianWordNumber extends Base
{
    /** @var array<int, string> */
    private static array $ones = [
        "", "uno", "due", "tre", "quattro", "cinque", "sei", "sette", "otto", "nove",
        "dieci", "undici", "dodici", "tredici", "quattordici", "quindici", "sedici", "diciassette", "diciotto", "diciannove",
    ];

    /** @var array<int, string> */
    private static array $tens = [
        "", "", "venti", "trenta", "quaranta", "cinquanta", "sessanta", "settanta", "ottanta", "novanta",
    ];

    /** @var array<int, array{string, string}> [singular, plural] from millions up */
    private static array $scales = [
        2 => ["un milione", "milioni"],
        3 => ["un miliardo", "miliardi"],
        4 => ["un bilione", "bilioni"],
    ];

    #[\Override]
    protected function currency(): array
    {
        return ["euro", "euro", "centesimo", "centesimi"];
    }

    #[\Override]
    protected function concatWord(): string
    {
        return "e";
    }

    #[\Override]
    protected function zero(): string
    {
        return "zero";
    }

    /**
     * "Uno" becomes "un" before the noun ("un euro"), and a round million or more takes "di"
     * before the currency ("un milione di euro").
     */
    #[\Override]
    protected function amount(int $number, string $one, string $many): string
    {
        if ($number === 1) {
            return "un " . $one;
        }
        if ($number >= 1_000_000 && $number % 1_000_000 === 0) {
            return $this->integerToWords($number) . " di " . $many;
        }

        return parent::amount($number, $one, $many);
    }

    #[\Override]
    protected function integerToWords(int $number): string
    {
        $words = [];
        $belowMillion = "";
        foreach ($this->groups($number) as [$group, $scale]) {
            if ($scale >= 2) {
                $words[] = $group === 1
                    ? self::$scales[$scale][0]
                    : $this->belowThousand($group) . " " . self::$scales[$scale][1];
            } elseif ($scale === 1) {
                $belowMillion .= $group === 1 ? "mille" : $this->belowThousand($group) . "mila";
            } else {
                $belowMillion .= $this->belowThousand($group);
            }
        }
        if ($belowMillion !== "") {
            $words[] = $belowMillion;
        }

        // Only a compound takes the accent: "tre" alone and "tremila" do not.
        return (string)preg_replace('/(?<=\S)tre\b/u', 'tré', implode(" ", $words));
    }

    private function belowThousand(int $number): string
    {
        $hundreds = intdiv($number, 100);
        $prefix = match ($hundreds) {
            0 => "",
            1 => "cento",
            default => self::$ones[$hundreds] . "cento",
        };

        $rest = $this->belowHundred($number % 100);
        if ($prefix !== "" && str_starts_with($rest, "ott")) {
            $prefix = substr($prefix, 0, -1);
        }

        return $prefix . $rest;
    }

    private function belowHundred(int $number): string
    {
        if ($number < 20) {
            return self::$ones[$number];
        }

        $tens = self::$tens[intdiv($number, 10)];
        $unit = $number % 10;
        if ($unit === 1 || $unit === 8) {
            $tens = substr($tens, 0, -1);
        }

        return $tens . self::$ones[$unit];
    }
}
