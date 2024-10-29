<?php

namespace ByJG\WordNumber;

class PortugueseWordNumber extends Base
{
    public function concatWord(): string
    {
        return "e";
    }

    public function currency(): array
    {
        return ["real", "reais", "centavo", "centavos"];
    }

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

    public function oneHundred(): string
    {
        return "cem";
    }

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
