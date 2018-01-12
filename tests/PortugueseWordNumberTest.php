<?php

namespace Tests;

use ByJG\WordNumber\EnglishWordNumber;
use ByJG\WordNumber\PortugueseWordNumber;

// backward compatibility
if (!class_exists('\PHPUnit\Framework\TestCase')) {
    class_alias('\PHPUnit_Framework_TestCase', '\PHPUnit\Framework\TestCase');
}

class PortugueseWordNumberTest extends \PHPUnit\Framework\TestCase
{
    public function provider()
    {
        return
        [
            [0, 'zero reais'],
            [1, 'um real'],
            [2, 'dois reais'],
            [3, 'tres reais'],
            [4, 'quatro reais'],
            [5, 'cinco reais'],
            [6, 'seis reais'],
            [7, 'sete reais'],
            [8, 'oito reais'],
            [9, 'nove reais'],
            [10, 'dez reais'],
            [11, 'onze reais'],
            [12, 'doze reais'],
            [13, 'treze reais'],
            [14, 'quatorze reais'],
            [15, 'quinze reais'],
            [16, 'dezesseis reais'],
            [17, 'dezessete reais'],
            [18, 'dezoito reais'],
            [19, 'dezenove reais'],
            [20, 'vinte reais'],
            [21, 'vinte um reais'],
            [22, 'vinte dois reais'],
            [23, 'vinte tres reais'],
            [24, 'vinte quatro reais'],
            [25, 'vinte cinco reais'],
            [26, 'vinte seis reais'],
            [27, 'vinte sete reais'],
            [28, 'vinte oito reais'],
            [29, 'vinte nove reais'],
            [30, 'trinta reais'],
            [31, 'trinta um reais'],
            [32, 'trinta dois reais'],
            [33, 'trinta tres reais'],
            [34, 'trinta quatro reais'],
            [35, 'trinta cinco reais'],
            [36, 'trinta seis reais'],
            [37, 'trinta sete reais'],
            [38, 'trinta oito reais'],
            [39, 'trinta nove reais'],
            [40, 'quarenta reais'],
            [41, 'quarenta um reais'],
            [42, 'quarenta dois reais'],
            [43, 'quarenta tres reais'],
            [44, 'quarenta quatro reais'],
            [45, 'quarenta cinco reais'],
            [46, 'quarenta seis reais'],
            [47, 'quarenta sete reais'],
            [48, 'quarenta oito reais'],
            [49, 'quarenta nove reais'],
            [50, 'cinquenta reais'],
            [51, 'cinquenta um reais'],
            [52, 'cinquenta dois reais'],
            [53, 'cinquenta tres reais'],
            [54, 'cinquenta quatro reais'],
            [55, 'cinquenta cinco reais'],
            [56, 'cinquenta seis reais'],
            [57, 'cinquenta sete reais'],
            [58, 'cinquenta oito reais'],
            [59, 'cinquenta nove reais'],
            [60, 'sessenta reais'],
            [61, 'sessenta um reais'],
            [62, 'sessenta dois reais'],
            [63, 'sessenta tres reais'],
            [64, 'sessenta quatro reais'],
            [65, 'sessenta cinco reais'],
            [66, 'sessenta seis reais'],
            [67, 'sessenta sete reais'],
            [68, 'sessenta oito reais'],
            [69, 'sessenta nove reais'],
            [70, 'setenta reais'],
            [71, 'setenta um reais'],
            [72, 'setenta dois reais'],
            [73, 'setenta tres reais'],
            [74, 'setenta quatro reais'],
            [75, 'setenta cinco reais'],
            [76, 'setenta seis reais'],
            [77, 'setenta sete reais'],
            [78, 'setenta oito reais'],
            [79, 'setenta nove reais'],
            [80, 'oitenta reais'],
            [81, 'oitenta um reais'],
            [82, 'oitenta dois reais'],
            [83, 'oitenta tres reais'],
            [84, 'oitenta quatro reais'],
            [85, 'oitenta cinco reais'],
            [86, 'oitenta seis reais'],
            [87, 'oitenta sete reais'],
            [88, 'oitenta oito reais'],
            [89, 'oitenta nove reais'],
            [90, 'noventa reais'],
            [91, 'noventa um reais'],
            [92, 'noventa dois reais'],
            [93, 'noventa tres reais'],
            [94, 'noventa quatro reais'],
            [95, 'noventa cinco reais'],
            [96, 'noventa seis reais'],
            [97, 'noventa sete reais'],
            [98, 'noventa oito reais'],
            [99, 'noventa nove reais'],
            [100, 'cem reais'],
            [101, 'cento e um reais'],
            [201, 'duzentos e um reais'],
            [301, 'trezentos e um reais'],
            [401, 'quatrocentos e um reais'],
            [501, 'quinhentos e um reais'],
            [601, 'seiscentos e um reais'],
            [701, 'setecentos e um reais'],
            [801, 'oitocentos e um reais'],
            [901, 'novecentos e um reais'],
            [1001, 'um mil e um reais'],
            [1111, 'um mil e cento e onze reais'],
            [2111, 'dois mil e cento e onze reais'],
            [3111, 'tres mil e cento e onze reais'],
            [4111, 'quatro mil e cento e onze reais'],
            [5111, 'cinco mil e cento e onze reais'],
            [6111, 'seis mil e cento e onze reais'],
            [7111, 'sete mil e cento e onze reais'],
            [8111, 'oito mil e cento e onze reais'],
            [9111, 'nove mil e cento e onze reais'],
            [10111, 'dez mil e cento e onze reais'],
            [11111, 'onze mil e cento e onze reais'],
            [1, 'um real'],
            [1.01, 'um real e um centavo'],
            [1.02, 'um real e dois centavos'],
            [1.03, 'um real e tres centavos'],
            [1.04, 'um real e quatro centavos'],
            [1.05, 'um real e cinco centavos'],
            [1.06, 'um real e seis centavos'],
            [1.07, 'um real e sete centavos'],
            [1.08, 'um real e oito centavos'],
            [1.09, 'um real e nove centavos'],
            [1.1, 'um real e dez centavos'],
            [1.11, 'um real e onze centavos'],
            [1.12, 'um real e doze centavos'],
            [1.13, 'um real e treze centavos'],
            [1.14, 'um real e quatorze centavos'],
            [1.15, 'um real e quinze centavos'],
            [1.16, 'um real e dezesseis centavos'],
            [1.17, 'um real e dezessete centavos'],
            [1.18, 'um real e dezoito centavos'],
            [1.19, 'um real e dezenove centavos'],
            [1.2, 'um real e vinte centavos'],
            [1.21, 'um real e vinte um centavos'],
            [1.22, 'um real e vinte dois centavos'],
            [1.23, 'um real e vinte tres centavos'],
            [1.24, 'um real e vinte quatro centavos'],
            [1.25, 'um real e vinte cinco centavos'],
            [1.26, 'um real e vinte seis centavos'],
            [1.27, 'um real e vinte sete centavos'],
            [1.28, 'um real e vinte oito centavos'],
            [1.29, 'um real e vinte nove centavos'],
            [1.3, 'um real e trinta centavos'],
            [1.31, 'um real e trinta um centavos'],
            [1.32, 'um real e trinta dois centavos'],
            [1.33, 'um real e trinta tres centavos'],
            [1.34, 'um real e trinta quatro centavos'],
            [1.35, 'um real e trinta cinco centavos'],
            [1.36, 'um real e trinta seis centavos'],
            [1.37, 'um real e trinta sete centavos'],
            [1.38, 'um real e trinta oito centavos'],
            [1.39, 'um real e trinta nove centavos'],
            [1.4, 'um real e quarenta centavos'],
            [1.41, 'um real e quarenta um centavos'],
            [1.42, 'um real e quarenta dois centavos'],
            [1.43, 'um real e quarenta tres centavos'],
            [1.44, 'um real e quarenta quatro centavos'],
            [1.45, 'um real e quarenta cinco centavos'],
            [1.46, 'um real e quarenta seis centavos'],
            [1.47, 'um real e quarenta sete centavos'],
            [1.48, 'um real e quarenta oito centavos'],
            [1.49, 'um real e quarenta nove centavos'],
            [1.5, 'um real e cinquenta centavos'],
            [1.51, 'um real e cinquenta um centavos'],
            [1.52, 'um real e cinquenta dois centavos'],
            [1.53, 'um real e cinquenta tres centavos'],
            [1.54, 'um real e cinquenta quatro centavos'],
            [1.55, 'um real e cinquenta cinco centavos'],
            [1.56, 'um real e cinquenta seis centavos'],
            [1.57, 'um real e cinquenta sete centavos'],
            [1.58, 'um real e cinquenta oito centavos'],
            [1.59, 'um real e cinquenta nove centavos'],
            [1.6, 'um real e sessenta centavos'],
            [1.61, 'um real e sessenta um centavos'],
            [1.62, 'um real e sessenta dois centavos'],
            [1.63, 'um real e sessenta tres centavos'],
            [1.64, 'um real e sessenta quatro centavos'],
            [1.65, 'um real e sessenta cinco centavos'],
            [1.66, 'um real e sessenta seis centavos'],
            [1.67, 'um real e sessenta sete centavos'],
            [1.68, 'um real e sessenta oito centavos'],
            [1.69, 'um real e sessenta nove centavos'],
            [1.7, 'um real e setenta centavos'],
            [1.71, 'um real e setenta um centavos'],
            [1.72, 'um real e setenta dois centavos'],
            [1.73, 'um real e setenta tres centavos'],
            [1.74, 'um real e setenta quatro centavos'],
            [1.75, 'um real e setenta cinco centavos'],
            [1.76, 'um real e setenta seis centavos'],
            [1.77, 'um real e setenta sete centavos'],
            [1.78, 'um real e setenta oito centavos'],
            [1.79, 'um real e setenta nove centavos'],
            [1.8, 'um real e oitenta centavos'],
            [1.81, 'um real e oitenta um centavos'],
            [1.82, 'um real e oitenta dois centavos'],
            [1.83, 'um real e oitenta tres centavos'],
            [1.84, 'um real e oitenta quatro centavos'],
            [1.85, 'um real e oitenta cinco centavos'],
            [1.86, 'um real e oitenta seis centavos'],
            [1.87, 'um real e oitenta sete centavos'],
            [1.88, 'um real e oitenta oito centavos'],
            [1.89, 'um real e oitenta nove centavos'],
            [1.9, 'um real e noventa centavos'],
            [1.91, 'um real e noventa um centavos'],
            [1.92, 'um real e noventa dois centavos'],
            [1.93, 'um real e noventa tres centavos'],
            [1.94, 'um real e noventa quatro centavos'],
            [1.95, 'um real e noventa cinco centavos'],
            [1.96, 'um real e noventa seis centavos'],
            [1.97, 'um real e noventa sete centavos'],
            [1.98, 'um real e noventa oito centavos'],
            [1.99, 'um real e noventa nove centavos'],
        ];
    }

    /**
     * @dataProvider provider
     */
    public function testPortugueseWords($input, $expected)
    {
        $englishWords = new PortugueseWordNumber();
        $this->assertEquals($expected, $englishWords->write($input));
    }
}