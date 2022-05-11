<?php

declare(strict_types=1);

namespace PrimeFactor\Src;

use Shared\Helpers\ArrayUtils;

/**
 * Najmniejsza wspólna wieloktroność
 *
 * @category Math
 * @author Grano22 Dev
 */
function NWW(int ...$numbers): int
{
    $diffFactors = [];
    $nextNumber = 1;

    foreach ($numbers as $numberIndex => $number) {
        $factors = PrimeFactors($number);

        if ($numberIndex > 0) {
            $diffFactors = ArrayUtils::subtract($factors, $diffFactors);
            $nextNumber = $numbers[$numberIndex - 1] * array_reduce($diffFactors, static fn(int $carry, int $item) => $carry *= $item, 1);
        }

        $diffFactors = $factors;
    }

    return $nextNumber;
}
