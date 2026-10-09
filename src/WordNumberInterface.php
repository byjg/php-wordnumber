<?php

namespace ByJG\WordNumber;

interface WordNumberInterface
{
    /**
     * Write a currency amount in words. Only the first two decimal places are considered.
     */
    public function write(float $number): string;
}
