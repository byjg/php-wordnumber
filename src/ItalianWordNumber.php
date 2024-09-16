<?php

namespace ByJG\WordNumber;

class ItalianWordNumber extends Base
{
    public function concatWord()
    {
        return "e";
    }

    public function currency()
    {
        return ["euro", "euro", "centesimo", "centesimi"];
    }

    public function unit()
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

    public function elevenToNineteen()
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

    public function twentyToNinety()
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

    public function oneHundred()
    {
        return "cento";
    }

    public function hundreds()
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

    public function tens()
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
