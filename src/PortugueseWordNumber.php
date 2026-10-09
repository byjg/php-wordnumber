<?php

namespace ByJG\WordNumber;

/**
 * Brazilian Portuguese: "e" between hundreds, tens and units ("cento e vinte e um"), "mil"
 * without "um", and "e" before the last group only when it is below one hundred or a round
 * hundred ("mil e um", "mil e duzentos", but "mil cento e onze").
 */
class PortugueseWordNumber extends Base
{
    /** @var array<int, string> */
    private static array $ones = [
        "", "um", "dois", "três", "quatro", "cinco", "seis", "sete", "oito", "nove",
        "dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezessete", "dezoito", "dezenove",
    ];

    /** @var array<int, string> */
    private static array $tens = [
        "", "", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa",
    ];

    /** @var array<int, string> */
    private static array $hundreds = [
        "", "cento", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos",
    ];

    /** @var array<int, array{string, string}> [singular, plural] from millions up */
    private static array $scales = [
        2 => ["milhão", "milhões"],
        3 => ["bilhão", "bilhões"],
        4 => ["trilhão", "trilhões"],
    ];

    #[\Override]
    protected function currency(): array
    {
        return ["real", "reais", "centavo", "centavos"];
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
     * A round million or more takes "de" before the currency: "um milhão de reais".
     */
    #[\Override]
    protected function amount(int $number, string $one, string $many): string
    {
        if ($number >= 1_000_000 && $number % 1_000_000 === 0) {
            return $this->integerToWords($number) . " de " . $many;
        }

        return parent::amount($number, $one, $many);
    }

    #[\Override]
    protected function integerToWords(int $number): string
    {
        $groups = $this->groups($number);
        $last = count($groups) - 1;

        $result = "";
        foreach ($groups as $i => [$group, $scale]) {
            if ($i > 0) {
                $result .= ($i === $last && ($group < 100 || $group % 100 === 0)) ? " e " : " ";
            }

            $result .= match (true) {
                $scale === 0 => $this->belowThousand($group),
                $scale === 1 => ($group === 1 ? "" : $this->belowThousand($group) . " ") . "mil",
                default => $this->belowThousand($group) . " " . self::$scales[$scale][$group === 1 ? 0 : 1],
            };
        }

        return $result;
    }

    private function belowThousand(int $number): string
    {
        if ($number === 100) {
            return "cem";
        }

        $words = [];
        if ($number >= 100) {
            $words[] = self::$hundreds[intdiv($number, 100)];
        }

        $rest = $number % 100;
        if ($rest >= 20) {
            $words[] = self::$tens[intdiv($rest, 10)];
            $rest %= 10;
        }
        if ($rest > 0) {
            $words[] = self::$ones[$rest];
        }

        return implode(" e ", $words);
    }
}
