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
		return array("euro", "euro", "centesimo", "centesimi");
	}

	public function unit()
	{
		return array(
			"uno", "due", "tre", "quattro", "cinque", "sei", "sette", "otto", "nove"
		);
	}

	public function elevenToNineteen()
	{
		return array(
			"dieci", "undici", "dodici", "tredici", "quattordici", "quindici",
			"sedici", "diciasette", "diciotto", "diciannove"
		);
	}

	public function twentyToNinety()
	{
		return array(
			"venti", "trenta", "quaranta", "cinquanta", "sessanta", "settanta", "ottanta", "novanta"
		);
	}

	public function oneHundred()
	{
		return "cento";
	}

	public function hundreds()
	{
		return array(
			"mille", "duemila", "tremila", "quattromila", "cinquemila", "seimila",
			"settemila", "ottomila", "novemila"
		);
	}

	public function tens()
	{
		return array(
			array(" e ", "",""),
			array(", ", "mille","mila"),
			array(", ", "milione","milioni"),
			array(", ", "miliardo","miliardi"),
			array(", ", "bilione","bilioni")
		);
	}
}
