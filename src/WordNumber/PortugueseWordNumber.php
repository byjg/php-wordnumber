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
		return array("real", "reais", "centavo", "centavos");
	}

	public function unit()
	{
		return array(
			"um", "dois", "tres", "quatro", "cinco", "seis", "sete", "oito", "nove"
		);
	}

	public function elevenToNineteen()
	{
		return array(
			"dez", "onze", "doze", "treze", "quatorze", "quinze",
			"dezesseis", "dezessete", "dezoito", "dezenove"
		);
	}

	public function twentyToNinety()
	{
		return array(
			"vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa"
		);
	}

	public function oneHundred()
	{
		return "cem";
	}

	public function hundreds()
	{
		return array(
			"cento", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos",
			"setecentos", "oitocentos", "novecentos"
		);
	}

	public function tens()
	{
		return array(
			array(" e ", "",""),
			array(", ", "mil","mil"),
			array(", ", "milhao","milhoes"),
			array(", ", "bilhao","bilhoes"),
			array(", ", "trilhao","trilhoes")
		);
	}
}
