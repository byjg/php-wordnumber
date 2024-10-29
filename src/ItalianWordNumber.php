<?php

namespace ByJG\WordNumber;

class ItalianWordNumber extends Base
{
    public function concatWord(): string
    {
        return "e";
    }

    public function currency(): array
    {
        return ["euro", "euro", "centesimo", "centesimi"];
    }

    public function unit(): array
    {
        return [
            "uno",
            "due",
            "tre",
            "quattro",
            "cinque",
            "sei",
            "sette",
            "otto",
            "nove",
        ];
    }

    public function elevenToNineteen(): array
    {
        return [
            "dieci",
            "undici",
            "dodici",
            "tredici",
            "quattordici",
            "quindici",
            "sedici",
            "diciasette",
            "diciotto",
            "diciannove",
        ];
    }

    public function twentyToNinety(): array
    {
        return [
            "venti",
            "trenta",
            "quaranta",
            "cinquanta",
            "sessanta",
            "settanta",
            "ottanta",
            "novanta",
        ];
    }

    public function oneHundred(): string
    {
        return "cento";
    }

    public function hundreds(): array
    {
        return [
            "mille",
            "duemila",
            "tremila",
            "quattromila",
            "cinquemila",
            "seimila",
            "settemila",
            "ottomila",
            "novemila",
        ];
    }

    public function tens(): array
    {
        return [
            [" e ", "", ""],
            [", ", "mille", "mila"],
            [", ", "milione", "milioni"],
            [", ", "miliardo", "miliardi"],
            [", ", "bilione", "bilioni"],
        ];
    }
}
