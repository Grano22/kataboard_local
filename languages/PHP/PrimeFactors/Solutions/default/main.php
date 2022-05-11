<?php

declare(strict_types=1);

use function PrimeFactor\Src\PrimeFactors;
use function PrimeFactor\Src\NWD;
use function PrimeFactor\Src\NWW;

function main(): void
{
    $primeParts = PrimeFactors(315);
    echo "\nShow prime factors of 315:\n";
    var_export($primeParts);
    echo "\nShow NWD of 60 and 20:\n";
    var_export(NWD(60, 20));
    echo "\nShow NWW of 45 and 60:\n";
    var_export(NWW(45, 60));
}
