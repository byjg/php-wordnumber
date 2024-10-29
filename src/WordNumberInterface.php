<?php

namespace ByJG\WordNumber;

interface WordNumberInterface
{
    public function concatWord(): string;

    public function currency(): array;

    public function tens(): array;

    public function unit(): array;

    public function elevenToNineteen(): array;

    public function twentyToNinety(): array;

    public function hundreds(): array;

    public function oneHundred(): string;
}
