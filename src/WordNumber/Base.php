<?php

namespace ByJG\WordNumber;

abstract class Base implements WordNumberInterface
{

	public function write($number)
	{
		$currency = $this->currency();

		if (intval($number) == 0)
		{
			return "zero " . $currency[1];
		}

		$integer = intval($number);
		$fration = intval($number*100) % 100;
		$parte1 = $this->process($integer);
		$parte2 = $this->process($fration);

		$result = $parte1;
		if (!empty($parte1))
		{
			$result .= ($integer == 1 ? $currency[0] : $currency[1]);
		}
		if (!empty($parte2))
		{
			$result .= " " . $this->concatWord() . " " . $parte2 . ($fration == 1 ? $currency[2] : $currency[3]);
		}
		return $result;
	}

	protected function process($number)
	{
		$milharArray = $this->tens();

		$numerosArray = array();
		$numerosArray[0] = array_merge([""], $this->unit());
		$numerosArray[1] = array_merge([""], array($this->elevenToNineteen()), $this->twentyToNinety());
		$numerosArray[2] = array_merge([""], $this->hundreds());

		$result = "";

		$parte = $number % 1000;
		$posicao = 0;
		$result_milhar = "";
		$posicao_preenchida = 0;
		while ($number > 0)
		{
			$unidade = $parte % 10;
			$dezena = intval(($parte % 100) / 10);
			$centena = intval(($parte % 1000) / 100);

			if ($parte == 100)
			{
				$result_milhar = $this->oneHundred();
			}
			else
			{
				if ($dezena == 1)
				{
					$result_milhar = $numerosArray[1][1][$unidade];
				}
				else
				{
					$result_milhar = $numerosArray[0][$unidade];
					$result_milhar = trim($numerosArray[1][$dezena] . ($result_milhar != "" ? " " : "") . $result_milhar);
				}
				$result_milhar = $numerosArray[2][$centena] . (($result_milhar!="") && ($numerosArray[2][$centena]!="") ? " " . $this->concatWord() . " " : "") . $result_milhar;
			}
			$result = (($result_milhar!="") ? $result_milhar . " " . $milharArray[$posicao][($parte == 1) ? 1 : 2] . (($result_milhar != "") && ($result!="") ? $milharArray[$posicao_preenchida][0] : "") : "") . $result;

			$number = intval($number / 1000);
			$parte = $number % 1000;
			$posicao_preenchida = ($result_milhar != "") ? $posicao : $posicao_preenchida;
			$posicao++;
		}

		return $result;
	}
}
