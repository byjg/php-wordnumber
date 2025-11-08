<?php

namespace ByJG\WordNumber;

class ItalianWordNumber extends Base
{
    #[\Override]
    public function concatWord(): string
    {
        return "e";
    }

    #[\Override]
    public function currency(): array
    {
        return ["euro", "euro", "centesimo", "centesimi"];
    }

    #[\Override]
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

    #[\Override]
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

    #[\Override]
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

    #[\Override]
    public function oneHundred(): string
    {
        return "cento";
    }

    #[\Override]
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

    #[\Override]
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
