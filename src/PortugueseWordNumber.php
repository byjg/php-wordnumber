<?php

namespace ByJG\WordNumber;

class PortugueseWordNumber extends Base
{
    #[\Override]
    public function concatWord(): string
    {
        return "e";
    }

    #[\Override]
    public function currency(): array
    {
        return ["real", "reais", "centavo", "centavos"];
    }

    #[\Override]
    public function unit(): array
    {
        return [
            "um",
            "dois",
            "tres",
            "quatro",
            "cinco",
            "seis",
            "sete",
            "oito",
            "nove",
        ];
    }

    #[\Override]
    public function elevenToNineteen(): array
    {
        return [
            "dez",
            "onze",
            "doze",
            "treze",
            "quatorze",
            "quinze",
            "dezesseis",
            "dezessete",
            "dezoito",
            "dezenove",
        ];
    }

    #[\Override]
    public function twentyToNinety(): array
    {
        return [
            "vinte",
            "trinta",
            "quarenta",
            "cinquenta",
            "sessenta",
            "setenta",
            "oitenta",
            "noventa",
        ];
    }

    #[\Override]
    public function oneHundred(): string
    {
        return "cem";
    }

    #[\Override]
    public function hundreds(): array
    {
        return [
            "cento",
            "duzentos",
            "trezentos",
            "quatrocentos",
            "quinhentos",
            "seiscentos",
            "setecentos",
            "oitocentos",
            "novecentos",
        ];
    }

    #[\Override]
    public function tens(): array
    {
        return [
            [" e ", "", ""],
            [", ", "mil", "mil"],
            [", ", "milhao", "milhoes"],
            [", ", "bilhao", "bilhoes"],
            [", ", "trilhao", "trilhoes"],
        ];
    }
}
