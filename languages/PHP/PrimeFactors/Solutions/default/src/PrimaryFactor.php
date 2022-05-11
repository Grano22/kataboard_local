<?php

declare(strict_types=1);

namespace PrimeFactor\Src;

function PrimeFactors(int $number): array {
    $primeParts = [];

    while (!($number % 2)) {
        $number /= 2;
        $primeParts[] = 2;
    }

    for ($factorizer = 3; $factorizer <= sqrt($number); $factorizer += 2) {
        while (!($number % $factorizer)) {
            $number /= $factorizer;
            $primeParts[] = $factorizer;
        }
    }

    $primeParts[] = $number;

    return $primeParts;
}