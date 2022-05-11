<?php

declare(strict_types=1);

namespace PrimeFactor\Src;

/**
 * Największy wspólny dzielnik
 *
 * @category Math
 * FIXME: change intersect algorythm to compare deeply items
 */
function NWD(int ...$numbers): int
{
    $intersection = [];

    foreach ($numbers as $numberIndex => $number) {
        $factors = PrimeFactors($number);

        if ($numberIndex === 0) {
            $intersection = $factors;
        } else {
            $intersection = array_intersect($factors, $intersection);
        }
    }

    return array_reduce($intersection, static fn (int $carry, int $item) => $carry *= $item, 1);
}
