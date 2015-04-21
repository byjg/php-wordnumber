<?php

namespace ByJG\WordNumber;

class EnglishWordNumber extends Base
{
	public function concatWord()
	{
		return "and";
	}

	public function currency()
	{
		return array("dollar", "dollars", "cent", "cents");
	}

	public function unit()
	{
		return array(
			"one", "two", "three", "four", "five", "six", "seven", "eight", "nine"
		);
	}

	public function elevenToNineteen()
	{
		return array(
			"ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen",
			"sixteen", "seventeen", "eighteen", "nineteen"
		);
	}

	public function twentyToNinety()
	{
		return array(
			"twenty", "thirty", "fourty", "fifty", "sixty", "seventy", "eigthty", "ninety"
		);
	}

	public function oneHundred()
	{
		return "one hundred";
	}

	public function hundreds()
	{
		return array(
			"one hundred", "two hundred", "three hundred", "four hundred", "five hundred", "six hundred",
			"seven hundred", "eigth hundred", "nine hundred"
		);
	}

	public function tens()
	{
		return array(
			array(" and ", "",""),
			array(", ", "thousand","thousands"),
			array(", ", "milion","milions"),
			array(", ", "bilion","bilions"),
			array(", ", "trilion","trilions")
		);
	}
}
