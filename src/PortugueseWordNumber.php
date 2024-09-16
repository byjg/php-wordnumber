<?php

namespace ByJG\WordNumber;

class PortugueseWordNumber extends Base
{
    public function concatWord()
    {
        return "e";
    }

    public function currency()
    {
        return ["real", "reais", "centavo", "centavos"];
    }

    public function unit()
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

    public function elevenToNineteen()
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

    public function twentyToNinety()
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

    public function oneHundred()
    {
        return "cem";
    }

    public function hundreds()
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

    public function tens()
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
