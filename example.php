<?php

require "vendor/autoload.php";

$wordNumber = new \ByJG\WordNumber\EnglishWordNumber();

for ($i = 0; $i<101; $i++) {
    echo "[" . $i . ", '" . $wordNumber->write($i) . "'],\n";
}

for ($i = 101; $i<1002; $i=$i+100) {
    echo "[" . $i . ", '" . $wordNumber->write($i) . "'],\n";
}

for ($i = 1111; $i<11112; $i=$i+1000) {
    echo "[" . $i . ", '" . $wordNumber->write($i) . "'],\n";
}

for ($i = 1; $i<2; $i=$i+0.01) {
    echo "[" . $i . ", '" . $wordNumber->write($i) . "'],\n";
}
