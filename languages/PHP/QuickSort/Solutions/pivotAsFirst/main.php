<?php

declare(strict_types=1);

use function QuickSort\Src\QuickSort;

function main(): void
{
    $baseArray = [12, 61, 42, 6, 13, 0, 21, 32, 42];
    echo "Unsorted Array:\n";
    var_export($baseArray);
    QuickSort($baseArray, 0, count($baseArray) - 1);
    echo "Sorted Array:\n";
    var_export($baseArray);
}
